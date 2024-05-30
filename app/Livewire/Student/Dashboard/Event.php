<?php

namespace App\Livewire\Student\Dashboard;

use Livewire\Component;
use App\Models\Calendar;
use Livewire\Attributes\Layout;

#[Layout('layouts.student')]
class Event extends Component
{
    public function render()
    {
        $events = [];

        $appointments = Calendar::all();

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->title,
                'start' => $appointment->start,
                'end' => $appointment->end,
            ];
        }
        return view('livewire.student.dashboard.event', compact('events'));
    }
}
