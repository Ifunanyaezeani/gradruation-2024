<?php

namespace App\Livewire\DormOwner\Dashboard;

use DateTime;
use App\Models\Booking;
use Livewire\Component;
use App\Enums\RoomStatus;
use App\Enums\BookingStatus;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.dorm-owner')]
class BookingDetails extends Component
{
    public $bookingId;

    public function confirmBooking(Booking $bookingId)
    {
        $bookingId->update([
            'booking_status' => BookingStatus::CONFIRMED->name,
            'start_date' => date('Y-m-d'),
            'end_date' => (new DateTime())->modify('+1 year')->format('Y-m-d'),
        ]);
        Session::flash('message', 'Student booking was successfully confirmed');
        $this->redirect(Route('dorm-owner.booking'), navigate: true);
    }

    public function cancelBooking(Booking $bookingId)
    {
        $bookingId->update(['booking_status' => BookingStatus::CANCELED->name]);
        $bookingId->room()->update(['availability' => RoomStatus::AVAILABLE->value]);
        Session::flash('message', 'Student booking was successfully canceled');
        $this->redirect(Route('dorm-owner.booking'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dorm-owner.dashboard.booking-details',[
            'booking' => Booking::whereId($this->bookingId)
                        ->with('room.dormitory', 'user')
                        ->first(),
        ]);
    }
}
