<?php

namespace App\Livewire\DormOwner\Dashboard;

use Livewire\Component;
use App\Models\DormOwner;
use App\Traits\SaveToCloud;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.dorm-owner')]
class Setting extends Component
{
    use  WithFileUploads, SaveToCloud;

    #[Validate('required')]
    public $firstName;

    #[Validate('required')]
    public $lastName;

    public $email;
    public $phone;

    #[Rule(['profilePicture' => 'nullable|image|max:1024'])]
    public $profilePicture;

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount()
    {
        $this->firstName = Auth::user()->first_name;
        $this->lastName = Auth::user()->last_name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone_number;
    }

    public function saveProfile()
    {
        $this->validate();
        $this->validateOnly('email', [
            'email' => 'required|email|unique:dorm_owners,email,' . Auth::user()->id // Ignore current user's ID
        ]);

        $dormOwnerProfile = DormOwner::find(Auth::user()->id);
        $isUpdated = $dormOwnerProfile->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone_number' => $this->phone,
            'profile_picture' => $this->profilePicture == null ? Auth::user()->profile_picture : $this->cloudinary($this->profilePicture),
        ]);

        Session::flash('message', 'Your profile was successfully updated');
        $this->redirect(Route('dorm-owner.setting'), navigate: true);
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
            $dormOwner = DormOwner::find(Auth::user()->id);
            $dormOwner->update([
                'password' => Hash::make($this->newPassword)
            ]);
            // TODO: notify the user through email that their password was changes
            Session::flash('message', 'Your password has been successfully changed');
            $this->redirect(Route('dorm-owner.setting'), navigate: true);
        } else {
            Session::flash('error_message', 'Your current password is incorrect');
            $this->redirect(Route('dorm-owner.setting'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.dorm-owner.dashboard.setting');
    }
}
