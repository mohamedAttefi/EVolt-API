<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ChargingSessionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/reservation', ReservationController::class);
Route::apiResource('/charging-session', ChargingSessionController::class);


Route::get('/user', function () {
    return response()->json(['user' => Auth::user()], 200);
})->middleware('auth:sanctum');
