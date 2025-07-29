<?php

use Illuminate\Support\Facades\Route;
use Modules\Apps\Http\Controllers\CalendarEventController;

Route::prefix('apps')->group(function () { Route::get('/calendar/events', [CalendarEventController::class, 'index']);
    Route::post('/calendar/events', [CalendarEventController::class, 'store']);
    Route::put('/calendar/events/{event}', [CalendarEventController::class, 'update']);
    Route::delete('/calendar/events/{event}', [CalendarEventController::class, 'destroy']);
});
