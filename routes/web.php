<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/hotel/{hotel_name}', [FrontController::class, 'hotel'])->middleware('auth')->name('front.hotel');
Route::post('/book', [FrontController::class, 'book'])->middleware('auth')->name('front.book');

Route::middleware(['auth', 'admin', 'verified'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('hotels', HotelController::class);
    Route::resource('bookings', BookingController::class);
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user-dashoard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('user-bookings', [BookingController::class, 'userindex'])->name('user.bookings');
});

require __DIR__.'/auth.php';
