<?php

namespace Modules\Auth\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // aquí tus Model => Policy si los usas
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        // Si tienes vistas propias:
        $this->loadViewsFrom(module_path('Auth', 'Resources/views'), 'auth');
        // (No hace falta loadRoutesFrom porque lo hace el RouteServiceProvider)
    }
}
