<?php

namespace App\Livewire\Student\Dashboard;

use App\Models\Review as ModelsReview;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.student')]
class Review extends Component
{
    public function deleteReview(ModelsReview $review)
    {
        $review->delete();
        Session::flash('message', 'Your dormitory review was successfully deleted');
        $this->redirect(Route('student.review'), navigate: true);
    }
    public function render()
    {
        return view('livewire.student.dashboard.review',[
            'reviews' => auth()->user()->reviews
        ]);
    }
}
