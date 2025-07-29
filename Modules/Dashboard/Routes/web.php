<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::middleware(['web', 'auth'])->group(function() {
    // Ruta principal del dashboard como vista inicial
    Route::get('/', [DashboardController::class, 'index'])
         ->name('dashboard.index');

    // Ruta alternativa (opcional)
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');
});
