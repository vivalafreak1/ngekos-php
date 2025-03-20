<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [HomeController::class, 'index'])->name('home');

Route::get( '/category/{slug}', action: [CategoryController::class, 'show'])->name(name: 'category.show');

Route::get( '/city/{slug}', action: [CityController::class, 'show'])->name(name: 'city.show');

Route::get( '/kos/{slug}', [BoardingHouseController::class, 'show'])->name(name: 'kos.show');
Route::get( '/kos/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name(name: 'kos.rooms');

Route::get('/kos/booking/{slug}', [BookingController::class, 'booking'])->name('booking');
Route::get('/kos/booking/{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/kos/booking/{slug}/information/save', [BookingController::class, 'saveInformation'])->name('booking.information.save');

Route::get('/kos/booking/{slug}/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
Route::post('/kos/booking/{slug}/payment', [BookingController::class, 'payment'])->name('booking.payment');

Route::get( '/find-kos', [BoardingHouseController::class, 'find'])->name(name: 'find-kos');

Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
