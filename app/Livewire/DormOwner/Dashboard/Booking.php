<?php

namespace App\Livewire\DormOwner\Dashboard;

use Livewire\Component;
use App\Models\Dormitory;
use App\Enums\BookingStatus;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.dorm-owner')]
class Booking extends Component
{
    // Initialize an array to hold booked rooms
    public $bookedRooms = [];

    public function statusCode($status)
    {
        if ($status == BookingStatus::CONFIRMED->name) {
            return 'badge bg-success bg-opacity-10 text-success';
        } elseif ($status == BookingStatus::PENDING->name) {
            return 'badge bg-secondary bg-opacity-10 text-secondary';
        } else {
            return 'badge bg-danger bg-opacity-10 text-danger';
        }
    }
    public function paymentStatus($status)
    {
        if ($status == BookingStatus::CONFIRMED->name) {
            return 'badge text-bg-success';
        } elseif ($status == BookingStatus::PENDING->name) {
            return 'badge text-bg-secondary';
        } else {
            return 'badge text-bg-danger';
        }
    }

    public function render()
    {
        $dormitories = Dormitory::where('dorm_owner_id', Auth::user()->id)->get();
        // Iterate over each dormitory
        foreach ($dormitories as $dormitory) {
            // Fetch rooms with any bookings for each dormitory
            $rooms = $dormitory->rooms()->whereHas('booking')->with('booking')->latest()->get();
            // Merge the booked rooms into the array
            $this->bookedRooms = array_merge($this->bookedRooms, $rooms->all());
        }

        return view('livewire.dorm-owner.dashboard.booking',[
            'bookings' => $this->bookedRooms,
        ]);
    }
}
