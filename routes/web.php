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

Route::get( '/find-kos', [BoardingHouseController::class, 'find'])->name(name: 'find-kos');

Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
