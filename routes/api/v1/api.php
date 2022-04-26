<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\NewPasswordController;
use App\Http\Controllers\api\v1\TwContratosCorporativoController;
use App\Http\Controllers\api\v1\TwCorporativosController;
use App\Http\Controllers\api\v1\TwDocumentosController;
use App\Http\Controllers\api\v1\TwEmpresasCorporativoController;
use App\Http\Controllers\api\v1\TwUsuariosController;

//Authentication
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

//Reset Password
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'resetPassword']);

//CRUD tw_usuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/list', [TwUsuariosController::class, 'index'])->middleware('auth:api');
    Route::post('/create', [TwUsuariosController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [TwUsuariosController::class, 'show'])->middleware('auth:api');
    Route::put('/update/{id}', [TwUsuariosController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [TwUsuariosController::class, 'destroy'])->middleware('auth:api');
});

//CRUD tw_corporativos
Route::prefix('corporativos')->group(function () {
    Route::get('/list', [TwCorporativosController::class, 'index'])->middleware('auth:api');
    Route::post('/create', [TwCorporativosController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [TwCorporativosController::class, 'show'])->middleware('auth:api');
    Route::put('/update/{id}', [TwCorporativosController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [TwCorporativosController::class, 'destroy'])->middleware('auth:api');
});

//CRUD tw_empresas_corporativos
Route::prefix('empresas-corporativos')->group(function () {
    Route::get('/list', [TwEmpresasCorporativoController::class, 'index'])->middleware('auth:api');
    Route::post('/create', [TwEmpresasCorporativoController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [TwEmpresasCorporativoController::class, 'show'])->middleware('auth:api');
    Route::put('/update/{id}', [TwEmpresasCorporativoController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [TwEmpresasCorporativoController::class, 'destroy'])->middleware('auth:api');
});

//CRUD tw_contratos_corporativos
Route::prefix('contratos-corporativos')->group(function () {
    Route::get('/list', [TwContratosCorporativoController::class, 'index'])->middleware('auth:api');
    Route::post('/create', [TwContratosCorporativoController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [TwContratosCorporativoController::class, 'show'])->middleware('auth:api');
    Route::put('/update/{id}', [TwContratosCorporativoController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [TwContratosCorporativoController::class, 'destroy'])->middleware('auth:api');
});

//CRUD tw_documentos
Route::prefix('documentos')->group(function () {
    Route::get('/list', [TwDocumentosController::class, 'index'])->middleware('auth:api');
    Route::post('/create', [TwDocumentosController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [TwDocumentosController::class, 'show'])->middleware('auth:api');
    Route::put('/update/{id}', [TwDocumentosController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [TwDocumentosController::class, 'destroy'])->middleware('auth:api');
});