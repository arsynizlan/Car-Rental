<?php

use App\Http\Controllers\BookingHistoriesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::resource('booking-histories', BookingHistoriesController::class);
});
