<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class StudentDetails extends Component
{
    public $id;

    public function render()
    {
        return view('livewire.admin.dashboard.student-details', [
            'student' => User::whereId($this->id)->first(),
        ]);
    }
}
