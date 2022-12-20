<?php

use App\Http\Controllers\ServiceHistoriesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::resource('service-histories', ServiceHistoriesController::class);
});