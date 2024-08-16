<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VacationSpotController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/vacation-spots', [VacationSpotController::class, 'index']);
    Route::post('/vacation-spots', [VacationSpotController::class, 'store']);

    Route::get('/wishlists', [WishlistController::class, 'index']);
    Route::post('/wishlists', [WishlistController::class, 'store']);
});
