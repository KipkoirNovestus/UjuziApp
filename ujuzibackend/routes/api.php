<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CaregiverController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('/client', ClientController::class);
Route::apiResource('/caregiver', CaregiverController::class);
Route::post('register',[userregistration::class,'registeruser']);
Route::post('login',[UserController::class,'login']);
