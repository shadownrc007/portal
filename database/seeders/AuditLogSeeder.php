<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Entities\AuditLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuditLogSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de tener usuarios
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('⚠️ No hay usuarios en la tabla users. Agrega algunos antes de correr el seeder.');
            return;
        }

        // Inserta 20 registros de auditoría
        foreach (range(1, 20) as $i) {
            $user = $users->random();

            AuditLog::create([
                'user_id'    => $user->id,
                'ip_address' => '192.168.1.' . rand(1, 255),
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'event'      => 'Acceso al sistema',
                'created_at' => now()->subMinutes(rand(1, 1000)),
            ]);
        }

        $this->command->info('✅ AuditLogSeeder completado: 20 registros insertados.');
    }
}
