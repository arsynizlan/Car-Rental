<?php

use App\Models\Car;
use App\Models\Booking;
use App\Charts\CarsChart;
use App\Charts\CarsUsageChart;
use App\Models\ServiceHistories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function (CarsChart $carsChart, CarsUsageChart $carsUsageChart) {

        /** Count Car*/
        $carsCount = Car::get()->count();

        /** Count Service */
        $servicesCount = ServiceHistories::get()->count();

        /** Count Booking X */
        $bookingX = Booking::where('status', '=', '1')
            ->orWhere('status', '=', '3')
            ->count();

        /** Count Booking Check */
        $bookingCheck = Booking::where('status', '=', '4')
            ->count();

        /** Request Approval X */
        $approvalX = Booking::where('user_id', Auth::user()->id)
            ->where('status', '=', '3')
            ->count();

        /** Request Approval Check */
        $approvalCheck = Booking::where('user_id', Auth::user()->id)
            ->where('status', '=', '4')
            ->count();

        return view('pages.dashboard.index', [
            'carsChart' => $carsChart->build(),
            'carsUsageChart' => $carsUsageChart->build(),
            'carsCount' => number_format($carsCount),
            'servicesCount' => number_format($servicesCount),
            'bookingX' => number_format($bookingX),
            'bookingCheck' => number_format($bookingCheck),
            'approvalX' => number_format($approvalX),
            'approvalCheck' => number_format($approvalCheck),
        ]);
    })->name('dashboard');
});