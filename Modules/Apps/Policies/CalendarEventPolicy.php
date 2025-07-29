<?php

namespace Modules\Apps\Policies;

use App\Models\User;
use Modules\Apps\Entities\Models\CalendarEvent;

class CalendarEventPolicy
{
    public function update(User $user, CalendarEvent $event): bool
    {
        return $user->id === $event->user_id;
    }

    public function delete(User $user, CalendarEvent $event): bool
    {
        return $user->id === $event->user_id;
    }
}
