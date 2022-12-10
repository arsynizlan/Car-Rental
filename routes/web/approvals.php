<?php

use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'role:Admin'], function () {
    Route::resource('approvals', ApprovalController::class);
});