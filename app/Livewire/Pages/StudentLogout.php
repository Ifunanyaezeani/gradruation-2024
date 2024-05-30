<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentLogout extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(): void
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        Session::flash('message', 'You\'ve been successfully logged out');
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.student-logout');
    }
}
