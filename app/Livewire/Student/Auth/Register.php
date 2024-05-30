<?php

namespace App\Livewire\Student\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Routing\Route;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.auth')]
class Register extends Component
{
    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required|string')]
    public $firstName;

    #[Validate('required|string')]
    public $lastName;

    #[Validate('required')]
    public $password;

    #[Validate('required')]
    public $terms;

    public function registerStudent()
    {
        // validation on the requests
        $newStudentInfo = $this->validate();

        // create new user to the data base
        $user = User::create([
            'first_name' => $newStudentInfo['firstName'],
            'last_name' => $newStudentInfo['lastName'],
            'email' => $newStudentInfo['email'],
            'password' => Hash::make($newStudentInfo['password'])
        ]);

        event(new Registered($user));

        // Flash message
        Session::flash('message', 'New account was successfully create as student, proceed to login');

        // Redirect to login screen
        $this->redirectIntended(Route('login'), navigate:true);
    }

    public function render()
    {
        return view('livewire.student.auth.register');
    }
}
