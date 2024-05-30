<?php

namespace App\Livewire\Student\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Traits\SaveToCloud;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.student')]
class Setting extends Component
{
  use  WithFileUploads, SaveToCloud;

    #[Validate('required')]
    public $firstName;

    #[Validate('required')]
    public $lastName;

    public $email;

    public $currentPassword;

    public $newPassword;

    public $confirmPassword;

    #[Validate('required')]
    public $phoneNumber;

    #[Validate('required')]
    public $nationality;

    #[Validate('required')]
    public $birthDay;

    #[Validate('required')]
    public $gender;

    #[Rule(['profilePicture' => 'nullable|image|max:1024'])]
    public $profilePicture;

    public function mount()
    {
        $this->firstName = Auth::user()->first_name;
        $this->lastName = Auth::user()->last_name;
        $this->phoneNumber = Auth::user()->phone_number;
        $this->nationality = Auth::user()->nationality;
        $this->birthDay = Auth::user()->birth_day;
        $this->gender = Auth::user()->gender;
    }

    public function saveProfile()
    {
        // $this->validate();
        $StudentProfile = User::find(Auth::user()->id);
        $isUpdated = $StudentProfile->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone_number' => $this->phoneNumber,
            'nationality' => $this->nationality,
            'birth_day' => $this->birthDay,
            'gender' => $this->gender,
            'profile_picture' => $this->profilePicture == null ? Auth::user()->profile_picture : $this->cloudinary($this->profilePicture),
        ]);
        Session::flash('message', 'Your profile was successfully updated');
        $this->redirect(Route('student.setting'), navigate: true);
    }

    public function updateEmail()
    {
        $this->validateOnly('email', [
            'email' => 'required|email|unique:users,email,' . Auth::user()->id // Ignore current user's ID
        ]);
        $StudentEmail = User::find(Auth::user()->id);

        $StudentEmail->update([
            'email' => $this->email
        ]);
        Session::flash('message', 'Your email address was successfully updated');
        $this->redirect(Route('student.setting'), navigate: true);
    }



    public function rules()
    {
        return [
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ];
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
            $student = User::find(Auth::user()->id);
            $student->update([
                'password' => Hash::make($this->newPassword)
            ]);
            // TODO: notify the user through email that their password was changes
            Session::flash('message', 'Your password has been successfully changed');
            $this->redirect(Route('student.setting'), navigate: true);
        } else {
            Session::flash('error_message', 'Your current password is incorrect');
            $this->redirect(Route('student.setting'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.student.dashboard.setting');
    }
}
