<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Amenity;
use App\Enums\DormStatus;
use App\Models\Dormitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Explore extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $dormTypes = $request->input('dorm_type', []);

        // Base query for fetching dormitories
        $dormitoriesQuery = Dormitory::where('status', DormStatus::APPROVED->name);

        // If there's a search query, modify the query to include search conditions
        if ($query) {
            $dormitoriesQuery->where(function ($q) use ($query) {
                $q->where('dorm_name', 'LIKE', "%{$query}%")
                ->orWhere('regin', 'LIKE', "%{$query}%")
                ->orWhere('city',
                    'LIKE',
                    "%{$query}%"
                )
                ->orWhere('policy',
                    'LIKE',
                    "%{$query}%"
                )
                ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }

        // If specific dorm types are selected, filter by those types
        if (!in_array('all', $dormTypes) && !empty($dormTypes)) {
            $dormitoriesQuery->whereIn('dorm_type', $dormTypes);
        }

        // Get the filtered or unfiltered dormitories with latest and pagination
        $dormitories = $dormitoriesQuery->latest()->with('amenities')->paginate(10);

        // Return the view with the fetched dormitories and amenities
        return view('pages.explore', [
            "ActiveDormitories" => $dormitories,
            "amenities" => Amenity::all()
        ]);
    }

    public function singleDorm($slug)
    {
        $dormitory = Dormitory::whereSlug($slug)->with('amenities', 'rooms', )->first();
        $reviews = Review::where('dormitory_id', $dormitory->id)->latest()->get();
        $totalReviews = $reviews->count();
        $averageRating = $reviews->avg('rating');

        // Calculate the percentage of each rating
        $ratingDistribution = $reviews->groupBy('rating')->map(function ($group) use ($totalReviews) {
            return ($group->count() / $totalReviews) * 100;
        });
        return view('pages.single-dorm',[
            'dorm_details' => $dormitory,
            'reviews' => $reviews,
            'totalReviews' => $totalReviews,
            'averageRating' => $averageRating,
            'ratingDistribution' => $ratingDistribution,
        ]);
    }
}
