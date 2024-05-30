<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Enums\DormStatus;
use App\Models\Dormitory;

class DormList extends Component
{
    public function render()
    {
        return view('livewire.pages.dorm-list', [
            "ActiveDormitories" => Dormitory::whereStatus(DormStatus::DRAFT->name)->paginate(),
        ]);
    }
}
