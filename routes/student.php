<?php

use App\Livewire\Student\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Student\Auth\Register;
use App\Livewire\Student\Dashboard\Pair;
use App\Livewire\Student\Dashboard\Forum;
use App\Livewire\Student\Dashboard\Index;
use App\Livewire\Student\Auth\VerifyEmail;
use App\Livewire\Student\Dashboard\Review;
use App\Livewire\Student\Dashboard\Setting;
use App\Livewire\Student\Auth\ResetPassword;
use App\Livewire\Student\Auth\ForgotPassword;
use App\Livewire\Student\Dashboard\Dormitory;
use App\Livewire\Student\Dashboard\DormitoryDetail;
use App\Livewire\Student\Dashboard\Event;

Route::middleware(['guest'])->group(function () {
    // basic student guest route
    Route::prefix('/student/auth')->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/register', Register::class)->name('register');
        Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
        Route::get('/password/reset/{token}', ResetPassword::class)->name('password.reset');
    });
});


Route::middleware(['auth'])->prefix('/student')->group(function () {
    Route::get('email/verify/{id}/{hash}', [VerifyEmail::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerifyEmail::class, 'resendVerification'])->name('verification.resend');

    Route::get('/', Index::class)->name('student.dashboard');
    Route::get('/forum', Forum::class)->name('student.forum');

    Route::get('/my-dormitory', Dormitory::class)->name('student.dormitory');
    ROute::get('/dormitory/{bookingId}/details', DormitoryDetail::class)->name('student.dormitory-detail');

    Route::get('/my-pair', Pair::class)->name('student.pair');
    Route::get('/my-review', Review::class)->name('student.review');

    Route::get('/events', Event::class)->name('student.events');

    Route::get('/setting', Setting::class)->name('student.setting');
});
