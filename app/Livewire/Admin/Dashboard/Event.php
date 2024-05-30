<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Calendar;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Event extends Component
{
    public $title;
    public $start;
    public $end;
    public $type;
    public $id;

    public function ajax()
    {

        switch ($this->type) {
            case 'add':
                $event = Calendar::create([
                    'title' => $this->title,
                    'start' => $this->start,
                    'end' => $this->end,
                ]);

                return redirect('/admin/calendar');
                break;

            case 'update':
                $event = Calendar::find($this->id)->update([
                    'title' => $this->title,
                    'start' => $this->start,
                    'end' => $this->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Calendar::find($this->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
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
        return view('livewire.admin.dashboard.event', compact('events'));
    }
}
