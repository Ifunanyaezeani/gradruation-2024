<?php

namespace App\Livewire\DormOwner\Dashboard;

use App\Models\Room;
use Livewire\Component;
use App\Traits\SaveToCloud;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.dorm-owner')]
class EditRoom extends Component
{

    use  WithFileUploads, SaveToCloud;

    public Room $room;

    #[Validate('required')]
    public $roomName;

    #[Validate('required')]
    public $roomType;

    #[Validate('required')]
    public $capacity;

    #[Validate('required')]
    public $price;

    public $vtu;

    #[Rule(['newRoomPictures.*' => 'nullable|image|max:2048'])]
    public $newRoomPictures = [];

    public $roomPictures;

    public function mount()
    {
        $this->roomName = $this->room->room_name;
        $this->roomType = $this->room->room_type;
        $this->capacity = $this->room->capacity;
        $this->price = $this->room->price;
        $this->vtu = $this->room->virtual_tour_url;
        $this->roomPictures = $this->room->room_pictures;
    }

    public function updateRoom()
    {
        $this->validate();
        $roomImages = [];
        if (!is_null($this->newRoomPictures)) {
            foreach ($this->newRoomPictures as $roomPicture) {
                $roomImages[] = $this->cloudinary($roomPicture);
            }
        }
        $this->room->update([
            'room_name' => $this->roomName,
            'room_type' => $this->roomType,
            'capacity' => $this->capacity,
            'price' => $this->price,
            'virtual_tour_url' => $this->vtu,
            'room_pictures' => $roomImages == null ? $this->roomPictures : $roomImages
        ]);
        Session::flash('message', 'You have successfully updated a room info');
        $this->redirect(Route('dorm-owner.add-room', $this->room->dormitory_id), navigate: false);
    }

    public function render()
    {
        return view('livewire.dorm-owner.dashboard.edit-room', [
            'room' => $this->room,
        ]);
    }
}
