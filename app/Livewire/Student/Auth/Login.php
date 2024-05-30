<?php

namespace App\Livewire\Student\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Route;

#[Layout('layouts.auth')]
class Login extends Component
{

    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $password;

    public $remember;

    public function attemptLogin(): void
    {
        // validate login credentials
        $credentials = $this->validate();

        // perform the login attempt
        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            $this->redirectIntended(Route('student.dashboard'), navigate:true);
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.student.auth.login');
    }
}
