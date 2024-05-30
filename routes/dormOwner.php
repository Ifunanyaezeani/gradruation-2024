<?php


use App\Http\Controllers\Explore;
use Illuminate\Support\Facades\Route;
use App\Livewire\DormOwner\Auth\Register;
use App\Livewire\DormOwner\Dashboard\Index;
use App\Livewire\DormOwner\Dashboard\Review;
use App\Livewire\DormOwner\Dashboard\AddRoom;
use App\Livewire\DormOwner\Dashboard\Booking;
use App\Livewire\DormOwner\Dashboard\Setting;
use App\Livewire\DormOwner\Dashboard\Dormitory;
use App\Livewire\DormOwner\Dashboard\AddAmenity;
use App\Livewire\DormOwner\Dashboard\AddDormitory;
use App\Livewire\DormOwner\Auth\Login as DormOwnerLogin;
use App\Livewire\DormOwner\Dashboard\BookingDetails;
use App\Livewire\DormOwner\Dashboard\EditRoom;

Route::middleware(['guest:dorm_owner'])->prefix('/dorm-owner/auth')->group(function () {
    // basic dorm-owner guest route
    Route::get('/login', DormOwnerLogin::class)->name('dorm-owner.login');
    Route::get('/register', Register::class)->name('dorm-owner.register');
});

Route::middleware(['auth:dorm_owner'])->prefix('/dashboard')->group(function () {
    Route::get('/', Index::class)->name('dorm-owner.dashboard');
    Route::get('/dormitories', Dormitory::class)->name('dorm-owner.dormitory');
    Route::get('/bookings', Booking::class)->name('dorm-owner.booking');
    Route::get('/booking/{bookingId}/details', BookingDetails::class)->name('dorm-owner.booking.details');
    Route::get('/reviews', Review::class)->name('dorm-owner.review');
    Route::get('/settings', Setting::class)->name('dorm-owner.setting');

    Route::get('/add-dormitory', AddDormitory::class)->name('dorm-owner.add-dorm');
    Route::get('/dorm/{slug}', [Explore::class, 'singleDorm'])->name('dorm-owner.single-dorm');
    Route::get('/dormitory/{id}/add-room', AddRoom::class)->name('dorm-owner.add-room');
    Route::get('/room/{room}/edit', EditRoom::class)->name('dorm-owner.edit-room');
    Route::get('/dormitory/{id}/add-amenities', AddAmenity::class)->name('dorm-owner.add-amenity');
});
