<?php

use App\Http\Controllers\ApprovalHistoriesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:Responsible Person']], function () {
    Route::resource('approval-histories', ApprovalHistoriesController::class);
});
