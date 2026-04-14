<?php

use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/menu', [MenuController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::post('/reservations', [ReservationController::class, 'store']);

