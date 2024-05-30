<?php

namespace App\Livewire\Student\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

#[Layout('layouts.auth')]
class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            $this->only(['email', 'password', 'password_confirmation', 'token']),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
                // Auth::login($user);
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('message', __($status));
            return redirect()->route('login');
        } else {
            session()->flash('error_message', __($status));
        }
    }

    public function render()
    {
        return view('livewire.student.auth.reset-password');
    }
}
