<?php

namespace App\Livewire\Student\Dashboard;

use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Dormitory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.student')]
class DormitoryDetail extends Component
{
    public $bookingId;

    #[Validate('required')]
    public $rating;

    #[Validate('required')]
    public $comment;

    public function postReview(Dormitory $dorm)
    {
        $this->validate();
        // dd($this->rating, $this->comment);
        $dorm->reviews()->create([
            'user_id' => Auth::user()->id,
            'title' => "Student Review",
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);
        Session::flash('message', 'Your dormitory review was successfully posted');
        $this->redirect(Route('student.review'), navigate: true);
    }


    public function render()
    {
        return view('livewire.student.dashboard.dormitory-detail',[
            'booking' => Booking::whereId($this->bookingId)
                        ->whereUserId(Auth::user()->id)
                        ->with('room.dormitory')
                        ->first(),
        ]);
    }
}
