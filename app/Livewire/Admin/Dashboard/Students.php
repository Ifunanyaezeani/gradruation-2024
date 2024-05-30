<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Students extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.students', [
            'students' => User::latest()->paginate(10),
        ]);
    }
}
