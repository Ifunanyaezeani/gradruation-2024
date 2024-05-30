<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Dormitory;
use App\Models\DormOwner;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.index',[
            'totalDorm' => Dormitory::count(),
            'totalRoom' => Room::count(),
            'totalStudent' => User::count(),
            'totalDormOwner' => DormOwner::count(),
            'latestDorm' => Dormitory::latest()->take(4)->get(),
            'recentStudent' => User::latest()->take(4)->get(),
            'recentDormOwner' => DormOwner::latest()->take(4)->get(),
            'recentReviews' => Review::latest()->take(4)->get(),
        ]);
    }
}
