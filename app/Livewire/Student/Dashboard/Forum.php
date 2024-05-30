<?php

namespace App\Livewire\Student\Dashboard;

use App\Models\Chat;
use App\Models\RoommatePairing;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

#[\Livewire\Attributes\Layout('layouts.student')]
class Forum extends Component
{
    public $message;
    public $roomMate;

    public function post()
    {
        $this->validate(['message' => 'required']);
        Chat::create([
            'user_id' => Auth::user()->id,
            'message' => $this->message,
            'is_roommate' => $this->roomMate ?? false,
        ]);
        Session::flash('message', 'post was successful');
        $this->redirect(Route('student.forum'), navigate: true);
    }

    public function delete(Chat $chat)
    {
        $chat->delete();
        Session::flash('message', 'your post was successfully deleted');
        $this->redirect(Route('student.forum'), navigate: true);
    }

    public function interested(Chat $pair)
    {
        if(Auth::user()->id == $pair->user->id)
        {
            Session::flash('error_message', 'Sorry you can not request interest to your self');
            $this->redirect(Route('student.forum'), navigate: true);
        }else{
            RoommatePairing::create([
                'user_id' => Auth::user()->id,
                'pair_id' => $pair->user->id,
                'room_mate_status' => "Pending",
            ]);
            Session::flash('message', 'you have successfully indicated interest to be room mate with ' . $pair->user->first_name);
            $this->redirect(Route('student.forum'), navigate: true);
        }

    }

    public function render()
    {
        return view('livewire.student.dashboard.forum',[
            'chats' => Chat::latest()->paginate(20)
        ]);
    }
}
