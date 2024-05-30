<?php

namespace App\Livewire\DormOwner\Dashboard;

use App\Models\Amenity;
use Livewire\Component;
use App\Models\Dormitory;
use Livewire\Attributes\Layout;
use App\Models\DormitoryAmenity;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.dorm-owner')]
class AddAmenity extends Component
{
    public $id;

    #[Validate('required')]
    public $amenityId;

    public function save()
    {
        $this->validate();
        // check if the amenity has been added already
        $isAdded = DormitoryAmenity::whereDormitoryId($this->id)->whereAmenityId($this->amenityId)->exists();
        if(!$isAdded){
            DormitoryAmenity::create([
                'dormitory_id' => $this->id,
                'amenity_id' => $this->amenityId
            ]);
            Session::flash('message', 'amenity was successfully added');
            $this->amenityId = '';
        }else{
            Session::flash('error_message', 'This amenity has already been added');
        }

    }

    public function deleteAmenity($id)
    {
        // get the dormitory amenity and delete it
       DormitoryAmenity::whereAmenityId($id)->first()->delete();
        Session::flash('message', 'dormitory amenity was successfully deleted');
    }

    public function render()
    {
        return view('livewire.dorm-owner.dashboard.add-amenity',[
            'dorm' => Dormitory::whereDormOwnerId(Auth::user()->id)->whereId($this->id)->with('amenities')->first(),
            'amenities' => Amenity::all()
        ]);
    }
}
