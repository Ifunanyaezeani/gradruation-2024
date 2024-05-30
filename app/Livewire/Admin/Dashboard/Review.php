<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Review as ModelsReview;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.admin')]
class Review extends Component
{
    public function deleteReview(ModelsReview $review)
    {
        $review->delete();
        Session::flash('message', 'Dormitory review was successfully deleted');
        $this->redirect(Route('admin.review'), navigate: true);
    }

    public function render()
    {
        $reviews = ModelsReview::all();
        $totalReviews = $reviews->count();
        $averageRating = $reviews->avg('rating');

        // Calculate the percentage of each rating
        $ratingDistribution = $reviews->groupBy('rating')->map(function ($group) use ($totalReviews) {
            return ($group->count() / $totalReviews) * 100;
        });

        return view('livewire.admin.dashboard.review',[
            'reviews' => ModelsReview::latest()->paginate(10),
            'totalReviews' => $totalReviews,
            'averageRating' => $averageRating,
            'ratingDistribution' => $ratingDistribution,
        ]);
    }
}
