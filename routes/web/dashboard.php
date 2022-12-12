<?php

use App\Charts\CarsChart;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function (CarsChart $carsChart) {
        return view('pages.dashboard.index', ['carsChart' => $carsChart->build()]);
    })->name('dashboard');
});