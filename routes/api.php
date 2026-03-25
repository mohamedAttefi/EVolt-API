<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ChargingSessionController;
use App\Http\Controllers\ChargingStationController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/reservation', ReservationController::class);
    Route::apiResource('/charging-session', ChargingSessionController::class);
    Route::apiResource('/charging-station', ChargingStationController::class);
});
