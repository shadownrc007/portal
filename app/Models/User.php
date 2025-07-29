<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // ✅ NECESARIO PARA ACCEDER A roles()
use Modules\Apps\Entities\Models\CalendarEvent;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // ✅ AGREGA HasRoles AQUÍ

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function calendarEvents()
{
    // Asumiendo que tu tabla de events tiene user_id
    return $this->hasMany(CalendarEvent::class, 'user_id', 'id');
}

}
