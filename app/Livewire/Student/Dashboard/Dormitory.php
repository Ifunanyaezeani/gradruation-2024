<?php

namespace App\Livewire\Student\Dashboard;

use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.student')]
class Dormitory extends Component
{
    public function render()
    {
        return view('livewire.student.dashboard.dormitory',[
            "bookedDorms" => Booking::whereUserId(Auth::user()->id)->with('room.dormitory')->latest()->get(),
        ]);
    }
}
