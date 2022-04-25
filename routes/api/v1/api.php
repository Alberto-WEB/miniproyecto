<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\NewPasswordController;

//Authentication
Route::prefix('usuarios')->group(function () {
    //Route::post('/login', 'AuthController@login');
    Route::post('/login', [AuthController::class, 'login']);
});

//Reset Password
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'resetPassword']);


