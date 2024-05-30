<?php

namespace App\Livewire\Admin\Dashboard;

use App\Enums\BookingStatus;
use App\Models\Booking as ModelsBooking;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Booking extends Component
{
    public function statusCode($status)
    {
        if($status == BookingStatus::CONFIRMED->name){
            return 'badge bg-success bg-opacity-10 text-success';
        }elseif($status == BookingStatus::PENDING->name){
            return 'badge bg-secondary bg-opacity-10 text-secondary';
        }else{
            return 'badge bg-danger bg-opacity-10 text-danger';
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard.booking',[
            'bookings' => ModelsBooking::latest()->paginate(20)
        ]);
    }
}
