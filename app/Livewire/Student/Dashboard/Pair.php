<?php

namespace App\Livewire\Student\Dashboard;

use Livewire\Component;
use App\Models\RoommatePairing;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.student')]
class Pair extends Component
{
    public function accept(RoommatePairing $rmm)
    {
        $rmm->update(['room_mate_status' => "Paired", 'is_accepted' => true]);
        \Illuminate\Support\Facades\Session::flash('message', '🎊 congratulation! 🎊, you now have a room mate');
        $this->redirect(Route('student.pair'), navigate: true);
    }

    public function decline(RoommatePairing $rmm)
    {
        $rmm->delete();
        \Illuminate\Support\Facades\Session::flash('message', 'room mate request has been declined');
        $this->redirect(Route('student.pair'), navigate: true);
    }

    public function cancel(RoommatePairing $rmm)
    {
        $rmm->update(['room_mate_status' => "Canceled"]);
        \Illuminate\Support\Facades\Session::flash('message', 'room mate status has been canceled');
        $this->redirect(Route('student.pair'), navigate: true);
    }

    public function render()
    {
        return view('livewire.student.dashboard.pair', [
            'pair_requests' => RoommatePairing::wherePairId(Auth::user()->id)->whereRoomMateStatus("Pending")->latest()->get(),
            'room_mates' => RoommatePairing::where('is_accepted', 1)
                ->where(function ($query) {
                    $query->where('pair_id', Auth::id())
                        ->orWhere('user_id', Auth::id());
                })
                ->latest()
                ->get(),
        ]);
    }
}
