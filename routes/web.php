<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Explore;
use Illuminate\Support\Facades\Route;


// all user entry point
Route::get('/', fn()=> view('pages.index'))->name('index');

Route::middleware(['auth:web'])->group(function(){
    Route::get('/explore', [Explore::class, 'index'])->name('explore');
    // Route::get('/explore/search', [Explore::class, 'search'])->name('explore.search');
    Route::get('explore/dorm/{slug}', [Explore::class, 'singleDorm'])->name('explore.single-dorm');
    Route::get('/explore/compare-dorm', fn()=>view('pages.compare'))->name('explore.compare');

    Route::get('/book-now/{dormId}/{roomId}/{slug}', [BookingController::class, 'bookingPage'])->name('booking.now');
    Route::get('/booking-confirmed/{userId}/{roomId}/{dormId}', [BookingController::class, 'confirmBooking'])->name('booking.confirm');
    Route::get('/{dormId}/{bookingId}/booking-success', [BookingController::class, 'bookingSuccess'])->name('booking-success');
});


