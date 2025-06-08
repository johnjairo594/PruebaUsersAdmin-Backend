<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'create']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'delete']);

Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/departamentos/{departamento}', [DepartamentoController::class, 'show']);
Route::post('/departamentos', [DepartamentoController::class, 'create']);
Route::put('/departamentos/{departamento}', [DepartamentoController::class, 'update']);
Route::delete('/departamentos/{departamento}', [DepartamentoController::class, 'delete']);

Route::get('/cargos', [CargoController::class, 'index']);
Route::get('/cargos/{cargo}', [CargoController::class, 'show']);
Route::post('/cargos', [CargoController::class, 'create']);
Route::put('/cargos/{cargo}', [CargoController::class, 'update']);
Route::delete('/cargos/{cargo}', [CargoController::class, 'delete']);
