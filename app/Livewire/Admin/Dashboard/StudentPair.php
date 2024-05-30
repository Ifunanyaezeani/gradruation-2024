<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\RoommatePairing;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class StudentPair extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.student-pair',[
            'room_mates' => RoommatePairing::whereIsAccepted(true)->latest()->paginate(10)
        ]);
    }
}
