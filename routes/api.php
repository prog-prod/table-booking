<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
