<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::resource('cars', CarController::class);
});