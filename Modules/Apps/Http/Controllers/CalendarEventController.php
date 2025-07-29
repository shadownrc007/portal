<?php

namespace Modules\Apps\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Apps\Entities\Models\CalendarEvent;
use App\Http\Controllers\Controller;

class CalendarEventController extends Controller
{
public function index()
{
    return CalendarEvent::where('user_id', auth()->id())
        ->get()
        ->map(function($e) {
            return [
                'id'    => $e->id,
                'title' => $e->title,
                'start' => $e->start_date->toIsoString(),
                'end'   => $e->end_date ? $e->end_date->toIsoString() : null,
                'extendedProps' => [
                'level'  => $e->level,
                'status' => $e->status,
                ],
            ];
        });
}



    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
            'level' => 'required|in:Work,Travel,Personal,Important',
        ]);

        $event = Auth::user()->calendarEvents()->create($data);

        return response()->json($event, 201);
    }

    public function update(Request $request, CalendarEvent $event)
    {
     

        $data = $request->validate([
            'title'      => 'sometimes|required|string|max:255',
            'start_date' => 'sometimes|required|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
           'level' => 'required|in:Work,Travel,Personal,Important',
        ]);

        $event->update($data);

        return response()->json($event);
    }

    public function destroy(CalendarEvent $event)
    {
  
        $event->delete();

        return response()->noContent();
    }

    private function color(?string $level): string
    {
        return match($level) {
            'medium' => 'bg-warning',
            'high'   => 'bg-danger',
            default  => 'bg-success',
        };
    }

    public function show(CalendarEvent $event)
{
    return response()->json($event);
}
}
