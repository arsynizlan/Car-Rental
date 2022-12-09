<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'role:Admin'], function () {
    Route::resource('bookings', BookingController::class);
});