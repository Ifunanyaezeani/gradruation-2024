<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

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
        $credentials = $this->validate();
        if (Auth::guard('admin')->attempt($credentials, $this->remember)) {
            session()->regenerate();
            $this->redirectIntended(route('admin'), true);
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }
    public function render()
    {
        return view('livewire.admin.login');
    }
}
