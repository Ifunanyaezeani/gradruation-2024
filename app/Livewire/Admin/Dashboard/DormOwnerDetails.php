<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Dormitory;
use App\Models\DormOwner;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.admin')]
class DormOwnerDetails extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $id;

    public function approvedDormOwner(DormOwner $dormOwner)
    {
        $dormOwner->update([
            'email_verified_at' => now()
        ]);
        Session::flash('message', 'dormitory owner account was successfully verified');
        $this->redirect(route('admin.dorm-owner.details', $this->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.dorm-owner-details', [
            'dormOwner' => DormOwner::whereId($this->id)->first(),
            'dorm' => Dormitory::whereDormOwnerId($this->id)->latest()->paginate(6),
            'totalDorm' => Dormitory::whereDormOwnerId($this->id)->count(),
            'totalRooms' => Room::whereHas('dormitory', function ($query) {
                                $query->where('dorm_owner_id', $this->id);
                            })->count(),
            'totalBookedDorm' => Dormitory::where('dorm_owner_id', $this->id)
                                ->whereHas('rooms', function ($query) {
                                    $query->whereHas('booking');
                                })
                                ->with(['rooms' => function ($query) {
                                    $query->whereHas('booking');
                                }, 'rooms.booking'])
                                ->count(),
        ]);
    }
}
