<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Web\JokesController;

// Web routes - CSRF protection is enabled automatically
Route::middleware(['web'])->group(function () {
    
    // Authentication routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Protected routes - accessible only when authenticated
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/jokes', [JokesController::class, 'index'])->name('jokes.index');
        Route::post('/jokes', [JokesController::class, 'store'])->name('jokes.store');
    });

    // Home route
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});
