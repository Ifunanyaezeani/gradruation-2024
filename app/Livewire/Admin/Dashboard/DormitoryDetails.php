<?php

namespace App\Livewire\Admin\Dashboard;

use App\Enums\DormStatus;
use App\Models\Dormitory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.admin')]
class DormitoryDetails extends Component
{

    public Dormitory $dormId;

    public function approvedDorm(Dormitory $dorm)
    {
        $dorm->update(['status' => DormStatus::APPROVED->name]);
        Session::flash('message', 'dormitory was successfully approved');
        $this->redirect(route('admin.dormitory-details', $this->dormId->id), navigate: true);
    }

    public function render()
    {
        // dd($this->dormId);
        return view('livewire.admin.dashboard.dormitory-details', [
            'dormitory' => $this->dormId,
        ]);
    }
}
