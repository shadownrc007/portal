<?php

use App\Http\Controllers\CalendarEventController;

Route::middleware('auth:sanctum')->group(function () {
    
    // Obtener eventos del usuario actual
    Route::get('/calendar/events', [CalendarEventController::class, 'index']);

    // Crear nuevo evento
    Route::post('/calendar/events', [CalendarEventController::class, 'store']);

    // Eliminar evento del usuario
    Route::delete('/calendar/events/{id}', [CalendarEventController::class, 'destroy']);
});
