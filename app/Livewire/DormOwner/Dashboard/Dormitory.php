<?php

namespace App\Livewire\DormOwner\Dashboard;

use App\Enums\DormStatus;
use App\Models\Dormitory as ModelsDormitory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.dorm-owner')]
class Dormitory extends Component
{
    public function statusCode($status)
    {
        if ($status == DormStatus::APPROVED->name) {
            return 'badge bg-success bg-opacity-10 text-success';
        } elseif ($status == DormStatus::PENDING->name) {
            return 'badge bg-secondary bg-opacity-10 text-secondary';
        } else {
            return 'badge text-secondary';
        }
    }

    public function render()
    {
        return view('livewire.dorm-owner.dashboard.dormitory',[
            'totalDorm' => ModelsDormitory::whereDormOwnerId(Auth::user()->id)->count(),
            'dormitories' => ModelsDormitory::latest()->whereDormOwnerId(Auth::user()->id)->paginate(10),
        ]);
    }
}
