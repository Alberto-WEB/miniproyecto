<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\NewPasswordController;
use App\Http\Controllers\api\v1\TwContactosCorporativoController;
use App\Http\Controllers\api\v1\TwContratosCorporativoController;
use App\Http\Controllers\api\v1\TwCorporativosController;
use App\Http\Controllers\api\v1\TwDocumentosController;
use App\Http\Controllers\api\v1\TwDocumentosCorporativoController;
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
Route::group(['prefix' => 'usuarios', 'middleware' => ['auth:api']], function(){
    Route::get('/list', [TwUsuariosController::class, 'index']);
    Route::post('/create', [TwUsuariosController::class, 'store']);
    Route::get('/show/{id}', [TwUsuariosController::class, 'show']);
    Route::put('/update/{id}', [TwUsuariosController::class, 'update']);
    Route::delete('/delete/{id}', [TwUsuariosController::class, 'destroy']);
});

//CRUD tw_corporativos
Route::group(['prefix' => 'corporativos', 'middleware' => ['auth:api', 'scope:1']], function(){
    Route::get('/list', [TwCorporativosController::class, 'index']);
    Route::post('/create', [TwCorporativosController::class, 'store']);
    Route::get('/show/{id}', [TwCorporativosController::class, 'show']);
    Route::put('/update/{id}', [TwCorporativosController::class, 'update']);
    Route::delete('/delete/{id}', [TwCorporativosController::class, 'destroy']);
    Route::get('/corporativo/{id}', [TwCorporativosController::class, 'corporativo']);
});

//CRUD tw_empresas_corporativos
Route::group(['prefix' => 'empresas-corporativos', 'middleware' => ['auth:api', 'scope:1']], function(){
    Route::get('/list', [TwEmpresasCorporativoController::class, 'index']);
    Route::post('/create', [TwEmpresasCorporativoController::class, 'store']);
    Route::get('/show/{id}', [TwEmpresasCorporativoController::class, 'show']);
    Route::put('/update/{id}', [TwEmpresasCorporativoController::class, 'update']);
    Route::delete('/delete/{id}', [TwEmpresasCorporativoController::class, 'destroy']);
});


//CRUD tw_contratos_corporativos
Route::group(['prefix' => 'contratos-corporativos', 'middleware' => ['auth:api', 'scope:2']], function(){
    Route::get('/list', [TwContratosCorporativoController::class, 'index']);
    Route::post('/create', [TwContratosCorporativoController::class, 'store']);
    Route::get('/show/{id}', [TwContratosCorporativoController::class, 'show']);
    Route::put('/update/{id}', [TwContratosCorporativoController::class, 'update']);
    Route::delete('/delete/{id}', [TwContratosCorporativoController::class, 'destroy']);
});

//CRUD tw_contactos_corporativos
Route::group(['prefix' => 'contactos-corporativos', 'middleware' => ['auth:api', 'scope:2']], function(){
    Route::get('/list', [TwContactosCorporativoController::class, 'index']);
    Route::post('/create', [TwContactosCorporativoController::class, 'store']);
    Route::get('/show/{id}', [TwContactosCorporativoController::class, 'show']);
    Route::put('/update/{id}', [TwContactosCorporativoController::class, 'update']);
    Route::delete('/delete/{id}', [TwContactosCorporativoController::class, 'destroy']);
});

//CRUD tw_documentos
Route::group(['prefix' => 'documentos', 'middleware' => ['auth:api', 'scope:3']], function(){
    Route::get('/list', [TwDocumentosController::class, 'index']);
    Route::post('/create', [TwDocumentosController::class, 'store']);
    Route::get('/show/{id}', [TwDocumentosController::class, 'show']);
    Route::put('/update/{id}', [TwDocumentosController::class, 'update']);
    Route::delete('/delete/{id}', [TwDocumentosController::class, 'destroy']);
});

//CRUD tw_documentos_corporativos
Route::group(['prefix' => 'documentos-corporativos', 'middleware' => ['auth:api', 'scope:3']], function(){
    Route::get('/list', [TwDocumentosCorporativoController::class, 'index']);
    Route::post('/create', [TwDocumentosCorporativoController::class, 'store']);
    Route::get('/show/{id}', [TwDocumentosCorporativoController::class, 'show']);
    Route::put('/update/{id}', [TwDocumentosCorporativoController::class, 'update']);
    Route::delete('/delete/{id}', [TwDocumentosCorporativoController::class, 'destroy']);
});