<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\DormOwner;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class DormOwners extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.dorm-owners',[
            'dormOwners' => DormOwner::latest()->paginate(10),
        ]);
    }
}
