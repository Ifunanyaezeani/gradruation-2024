<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Dormitory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[Layout('layouts.admin')]
class Dormitories extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        return view('livewire.admin.dashboard.dormitories', [
            'dormitories' => Dormitory::latest()->paginate(20),
        ]);
    }
}
