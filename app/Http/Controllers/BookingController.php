<?php

namespace App\Http\Controllers;

use App\Enums\RoomStatus;
use App\Models\Booking;
use DateTime;
use App\Models\Room;
use App\Models\User;
use App\Models\Dormitory;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookingPage($dormId, Room $roomId, $slug)
    {
        return view('pages.book-now',[
            'dorm' => Dormitory::whereId($dormId)->with('amenities')->first(),
            'room' => $roomId
        ]);
    }

    public function confirmBooking(User $userId, Room $roomId, Dormitory $dormId)
    {
        // create the booking
        $booking = $userId->bookings()->create([
            'room_id' => $roomId->id,
            'start_date' => date('Y-m-d'),
            'end_date' => (new DateTime())->modify('+1 year')->format('Y-m-d'),
        ]);
        // set room availability to be Booked
        $roomId->update(['availability' => RoomStatus::BOOKED->value]);
        return redirect(route('booking-success', [$dormId->id, $booking->id]));
    }

    public function bookingSuccess(Dormitory $dormId, Booking $bookingId)
    {
        // return Booking::whereId($bookingId->id)->with('user', 'room')->first();
        return view('pages.booking-success', [
            'dorm' => $dormId,
            'booking' => Booking::whereId($bookingId->id)->with('user', 'room')->first(),
        ]);
    }
}
