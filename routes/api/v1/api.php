<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\NewPasswordController;
use App\Http\Controllers\api\v1\TwUsuariosController;

//Authentication
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

//Reset Password
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'resetPassword']);

//CRUD TwUsuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/list', [TwUsuariosController::class, 'index'])->middleware('auth:api');
    Route::post('/create', [TwUsuariosController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [TwUsuariosController::class, 'show'])->middleware('auth:api');
    Route::put('/update/{id}', [TwUsuariosController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [TwUsuariosController::class, 'destroy'])->middleware('auth:api');
});