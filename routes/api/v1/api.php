<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Authentication
Route::prefix('usuarios')->group(function () {
    //Route::post('/login', 'AuthController@login');
    Route::post('/login', [AuthController::class, 'login']);
});