<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Booking;
use Livewire\Component;
use App\Enums\BookingStatus;
use App\Enums\RoomStatus;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.admin')]
class BookingDetails extends Component
{
    public Booking $booking;

    public function cancelBooking(Booking $bookingId)
    {

        $bookingId->update(['booking_status' => BookingStatus::CANCELED->name]);
        // free up the room that was canceled
        $bookingId->room()->update(['availability' => RoomStatus::AVAILABLE->value]);
        Session::flash('message', 'Student booking was successfully canceled');
        $this->redirect(Route('admin.booking-details', $bookingId->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.booking-details',[
            'booking' => $this->booking,
        ]);
    }
}
