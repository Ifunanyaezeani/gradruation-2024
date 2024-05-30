<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DormOwnerLogout extends Component
{

    /**
     * Log the current user out of the application.
     */
    public function logout(): void
    {
        Auth::guard('dorm_owner')->logout();

        Session::invalidate();
        Session::regenerateToken();
        Session::flash('message', 'You\'ve been successfully logged out');
        $this->redirect(route('dorm-owner.login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.dorm-owner-logout');
    }
}
