<?php

namespace App\Livewire\DormOwner\Auth;

use App\Models\DormOwner;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        // check if this dorm owner has been approved by the admin
        $dow = DormOwner::whereEmail($this->email)->first();
        if($dow == null) {
            $this->addError('email', 'Invalid email address');
        }elseif($dow->email_verified_at == null){
            Session::flash('error_message', 'You\'ve not been been verified yet by the admin');
        }elseif (Auth::guard('dorm_owner')->attempt($credentials, $this->remember)) {
            session()->regenerate();
            $this->redirectIntended(route('dorm-owner.dashboard'), true);
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.dorm-owner.auth.login');
    }
}
