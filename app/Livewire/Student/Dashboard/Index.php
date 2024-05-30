<?php

namespace App\Livewire\Student\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.student')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.student.dashboard.index');
    }
}
