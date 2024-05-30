<?php

namespace App\Livewire\DormOwner\Auth;

use Livewire\Component;
use App\Models\DormOwner;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.auth')]
class Register extends Component
{

    #[Validate('required|email|unique:dorm_owners,email')]
    public $email;

    #[Validate('required|string')]
    public $firstName;

    #[Validate('required|string')]
    public $lastName;

    #[Validate('required')]
    public $password;

    #[Validate('required')]
    public $terms;

    public function registerDormOwner()
    {
        // validation on the requests
        $newDormOwner = $this->validate();

        // create new user to the data base
        DormOwner::create([
            'first_name' => $newDormOwner['firstName'],
            'last_name' => $newDormOwner['lastName'],
            'email' => $newDormOwner['email'],
            'password' => Hash::make($newDormOwner['password'])
        ]);

        // Flash message
        Session::flash('message', 'New account was successfully create as dormitory owner, proceed to login');

        // Redirect to login screen
        $this->redirect(Route('dorm-owner.login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dorm-owner.auth.register');
    }
}
