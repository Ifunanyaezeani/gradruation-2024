<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Admin;
use App\Models\Amenity;
use Livewire\Component;
use App\Traits\SaveToCloud;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.admin')]
class Setting extends Component
{
    use  WithFileUploads, SaveToCloud;

    #[Validate('required')]
    public $firstName;

    #[Validate('required')]
    public $lastName;

    public $email;

    #[Rule(['profilePicture' => 'nullable|image|max:1024'])]
    public $profilePicture;

    public $amenity;

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public $newAdminFirstName;
    public $newAdminLastName;
    public $newAdminEmail;
    public $newAdminPassword;

    public function mount()
    {
        $this->firstName = Auth::user()->first_name;
        $this->lastName = Auth::user()->last_name;
        $this->email = Auth::user()->email;
    }

    public function saveProfile()
    {
        $this->validate();
        $this->validateOnly('email', [
            'email' => 'required|email|unique:admins,email,' . Auth::user()->id // Ignore current user's ID
        ]);

        $dormOwnerProfile = Admin::find(Auth::user()->id);
        $isUpdated = $dormOwnerProfile->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'profile_picture' => $this->profilePicture == null ? Auth::user()->profile_picture : $this->cloudinary($this->profilePicture),
        ]);

        Session::flash('message', 'Your profile was successfully updated');
        $this->redirect(Route('admin.setting'), navigate: true);
    }

    public function addAdmin()
    {
        $this->validateOnly('newAdminFirstName', [
            'newAdminFirstName' => 'required'
        ]);
        $this->validateOnly('newAdminLastName', [
            'newAdminLastName' => 'required'
        ]);
        $this->validateOnly('newAdminEmail', [
            'newAdminEmail' => 'required|email|unique:admins,email'
        ]);
        $this->validateOnly('newAdminPassword', [
            'newAdminPassword' => 'required'
        ]);

        Admin::create([
            'first_name' => $this->newAdminFirstName,
            'last_name' => $this->newAdminLastName,
            'email' => $this->newAdminEmail,
            'password' => Hash::make($this->newAdminPassword),
        ]);

        Session::flash('message', 'Your have successfully Added a new admin');
        $this->redirect(Route('admin.setting'), navigate: true);
    }

    public function changePassword()
    {
        $this->validateOnly('currentPassword', [
            'currentPassword' => 'required'
        ]);
        $this->validateOnly('newPassword', [
            'newPassword' => 'required'
        ]);
        $this->validateOnly('confirmPassword', [
            'confirmPassword' => 'required|same:newPassword'
        ]);

        if (Hash::check($this->currentPassword, Auth::user()->password)) {
            $admin = Admin::find(Auth::user()->id);
            $admin->update([
                'password' => Hash::make($this->newPassword)
            ]);
            // TODO: notify the user through email that their password was changes
            Session::flash('message', 'Your password has been successfully changed');
            $this->redirect(Route('admin.setting'), navigate: true);
        } else {
            Session::flash('error_message', 'Your current password is incorrect');
            $this->redirect(Route('admin.setting'), navigate: true);
        }
    }

    public function saveAmenity()
    {
        $this->validateOnly('amenity', ['amenity' => 'required|unique:amenities,amenity_name']);
        Amenity::create([
            'amenity_name' => $this->amenity
        ]);
        Session::flash('message', 'You have successfully added an amenity');
        $this->amenity = '';
    }

    public function deleteAmenity(Amenity $amenity)
    {
        $amenity->delete();
        Session::flash('message', 'You have successfully deleted an amenity');
    }

    public function render()
    {
        return view('livewire.admin.dashboard.setting',[
            'admins' => Admin::latest()->paginate(4),
            'amenities' =>Amenity::all(),
        ]);
    }
}
