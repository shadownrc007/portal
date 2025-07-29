<?php

use Illuminate\Support\Facades\Route;
use Modules\Apps\Http\Controllers\CalendarEventController;

/*
|--------------------------------------------------------------------------
| Rutas del módulo Apps – Calendar
| Autenticación: sesión (middleware 'auth')
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])
      ->prefix('apps')
      ->name('apps.')
      ->group(function () {

          Route::view('calendar', 'apps::calendar')
               ->name('calendar');

          // Listar y crear
          Route::get('calendar/events',  [CalendarEventController::class, 'index']);
          Route::post('calendar/events', [CalendarEventController::class, 'store']);

          // **Mostrar un único evento**
          Route::get('calendar/events/{event}', [CalendarEventController::class, 'show']);

          // Actualizar y borrar
          Route::put('calendar/events/{event}',    [CalendarEventController::class, 'update']);
          Route::delete('calendar/events/{event}', [CalendarEventController::class, 'destroy']);
});

