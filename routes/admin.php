<?php

use App\Http\Controllers\Explore;
use App\Livewire\Admin\Dashboard\Booking;
use App\Livewire\Admin\Dashboard\BookingDetails;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard\Index;
use App\Livewire\Admin\Dashboard\Students;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Admin\Dashboard\DormOwners;
use App\Livewire\Admin\Dashboard\Dormitories;
use App\Livewire\Admin\Dashboard\DormitoryDetails;
use App\Livewire\Admin\Dashboard\DormOwnerDetails;
use App\Livewire\Admin\Dashboard\Event;
use App\Livewire\Admin\Dashboard\Review;
use App\Livewire\Admin\Dashboard\Setting;
use App\Livewire\Admin\Dashboard\StudentDetails;
use App\Livewire\Admin\Dashboard\StudentPair;
use App\Livewire\Student\Dashboard\DormitoryDetail;

Route::middleware(['guest:admin'])->group(function () {
    // basic admin guest route
    Route::get('/admin/login', AdminLogin::class)->name('admin.login');
});

Route::middleware(['auth:admin'])->prefix('/admin')->group(function () {
    // basic admin guest route
    Route::get('/', Index::class)->name('admin');

    Route::get('/dormitory-owners', DormOwners::class)->name('admin.dorm-owners');
    Route::get('/dormitory-owner/{id}/details', DormOwnerDetails::class)->name('admin.dorm-owner.details');

    Route::get('/students', Students::class)->name('admin.students');
    Route::get('/student/{id}/details', StudentDetails::class)->name('admin.student.details');

    Route::get('/dormitories', Dormitories::class)->name('admin.dormitories');
    Route::get('/dormitory/{dormId}/details', DormitoryDetails::class)->name('admin.dormitory-details');
    Route::get('/dorm/{slug}', [Explore::class, 'singleDorm'])->name('admin.single-dorm');

    Route::get('/bookings', Booking::class)->name('admin.bookings');
    Route::get('/booking/{booking}/details', BookingDetails::class)->name('admin.booking-details');

    Route::get('/reviews', Review::class)->name('admin.review');
    Route::get('/student-pair', StudentPair::class)->name('admin.student-pair');

    Route::get('/calendar', Event::class)->name('admin.calendar');
    Route::post('/calenderAjax', [\App\Http\Controllers\CalendarController::class, 'ajax'])->name('admin.calenderAjax');

    Route::get('/setting', Setting::class)->name('admin.setting');
});
