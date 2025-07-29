<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;

Route::get('/users/list', [UsersController::class, 'index'])->name('users.list');

// Ruta para activar usuario
Route::patch('/users/enable/{id}', [UsersController::class, 'enable'])->name('users.enable');

Route::patch('/users/{id}/toggle', [UsersController::class, 'toggleStatus'])->name('users.toggleStatus');