<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JokeController;
use App\Http\Controllers\Api\AuthController;

// API routes - Stateless, CSRF protection is disabled by default
Route::middleware(['api'])->group(function () {
    
    // Authentication routes for API
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    // Jokes API - Accessible only when authenticated
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/jokes', [JokeController::class, 'index']);
        Route::post('/jokes', [JokeController::class, 'store']);
    });
});
