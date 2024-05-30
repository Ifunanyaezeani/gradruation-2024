<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use DateTime;
use App\Models\Room;
use App\Models\User;
use App\Models\Dormitory;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index(Request $request)
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

    public function ajax(Request $request)
    {

        switch ($request->type) {
           case 'add':
              $event = Calendar::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return redirect('/admin/calendar');
             break;

           case 'update':
              $event = Calendar::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'delete':
              $event = Calendar::find($request->id)->delete();

              return response()->json($event);
             break;

           default:
             # code...
             break;
        }
    }
}
