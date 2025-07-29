<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\AuditController;

Route::prefix('core')->middleware(['web', 'auth'])->group(function () {
    Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');
});
