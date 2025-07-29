<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Password;

// Rutas para invitados
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login',    [AuthController::class, 'showLoginForm'])->name('auth.login');
    Route::post('login',   [AuthController::class, 'login']);
    
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register']);

    
    Route::get('/forgot-password', [AuthController::class, 'showResetRequestForm'])->name('auth.password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('auth.password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('auth.password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.password.update');


});

// Rutas para usuarios autenticados
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout.post');

    Route::get('/unlock', [AuthController::class, 'unlockForm'])->name('auth.unlock');
    Route::post('/unlock', [AuthController::class, 'unlock'])->name('auth.unlock.post');

});


