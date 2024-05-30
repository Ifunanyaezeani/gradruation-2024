<?php

namespace App\Livewire\Student\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;

class VerifyEmail extends Component
{
    public function resendVerification(User $user)
    {
        if ($user->hasVerifiedEmail()) {
            session()->flash('status', 'Your email has been verified!');
            $this->redirect(route('student.dashboard'), navigate: true);
            die;
        }

        $user->sendEmailVerificationNotification();

        session()->flash('status', 'Verification link sent!');
    }

    public function verify($id, $hash)
    {
        if (!URL::hasValidSignature(request())) {
            abort(403, 'Invalid signature.');
        }

        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Invalid signature.');
        }

        if ($user->hasVerifiedEmail()) {
            $this->redirect(route('student.dashboard'), navigate:true);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        return redirect()->route('student.dashboard')->with('status', 'Your email has been verified!');
        // session()->flash('status', 'Your email has been verified!');
        // $this->redirect(route('student.dashboard'), navigate: true);
    }
    public function render()
    {
        return view('livewire.student.auth.verify-email');
    }
}
