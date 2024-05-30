<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class DormOwnerMenu extends Component
{

    public function active_link($route_name)
    {
        return $route_name == request()->url() ? 'active' : '';
    }


    public function render()
    {
        return view('livewire.pages.dorm-owner-menu');
    }
}
