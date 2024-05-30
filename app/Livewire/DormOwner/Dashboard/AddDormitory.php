<?php

namespace App\Livewire\DormOwner\Dashboard;

use App\Enums\DormStatus;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Dormitory;
use App\Traits\SaveToCloud;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.dorm-owner')]
class AddDormitory extends Component
{
    use SaveToCloud;

    use WithFileUploads;
    #[Validate('required')]
    public $dormName;

    #[Validate('required')]
    public $dormType;

    #[Validate('required')]
    public $region;

    #[Validate('required')]
    public $city;

    #[Validate('required')]
    public $address;

    #[Validate('required')]
    public $description;

    #[Validate('required')]
    public $policy;

    #[Rule(['dormPicture' => 'required|image|max:1024'])]
    public $dormPicture;

    public function save()
    {
        $this->validate();

        // perform dorm image upload
        // $imageName = uniqid() . '.' . $this->dormPicture->getClientOriginalExtension();
        // $this->dormPicture->storeAs('public/dorm-images', $imageName);

        // create the dorm once the validation pass
        $newDorm = new Dormitory();
        $newDorm->dorm_name = $this->dormName;
        $newDorm->slug = Str::of($this->dormName)->slug('-');
        $newDorm->street_address = $this->address;
        $newDorm->regin = $this->region;
        $newDorm->city = $this->city;
        $newDorm->dorm_owner_id = Auth::user()->id;
        $newDorm->dorm_type = $this->dormType;
        $newDorm->status = DormStatus::DRAFT->name;
        $newDorm->description = $this->description;
        $newDorm->policy = $this->policy;
        $newDorm->main_image = $this->cloudinary($this->dormPicture);
        $newDorm->save();
        // Flash message
        Session::flash('message', 'New dormitory was successfully create, proceed to add rooms');

        // Redirect to login screen
        $this->redirect(Route('dorm-owner.dormitory'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dorm-owner.dashboard.add-dormitory');
    }
}
