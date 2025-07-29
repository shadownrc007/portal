<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AuditLog extends Model
{
    protected $table = 'audit_log';

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'event',
        'created_at',
    ];

    public $timestamps = false;

    /**
     * Evita que Laravel intente usar `updated_at` incluso desde observers o traits
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            unset($model->updated_at); // evita error por campo inexistente
        });
    }

    /**
     * Relación con el modelo User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
