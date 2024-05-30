<?php

namespace App\Livewire\DormOwner\Dashboard;

use Livewire\Component;
use App\Models\Dormitory;
use App\Models\Room;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.dorm-owner')]
class Index extends Component
{
    public function render()
    {
        // return Dormitory::whereDormOwnerId(Auth::user()->id)->with('rooms')->get();
        return view('livewire.dorm-owner.dashboard.index',[
            'totalDorm' => Dormitory::whereDormOwnerId(Auth::user()->id)->count(),
            'totalRooms' => Room::whereHas('dormitory', function ($query) {
                            $query->where('dorm_owner_id', Auth::user()->id);
                        })->count(),
            'availableRooms' => Room::whereAvailability('Available')->whereHas('dormitory', function ($query) {
                $query->where('dorm_owner_id', Auth::user()->id);
            })->count(),
            'bookedDormitories' => Dormitory::where('dorm_owner_id', Auth::user()->id)
                                ->whereHas('rooms', function ($query) {
                                    $query->whereHas('booking');
                                })
                                ->with(['rooms' => function ($query) {
                                    $query->whereHas('booking');
                                }, 'rooms.booking'])
                                ->paginate(),
        ]);
    }
}
