<?php
namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Carga tus vistas bajo el namespace "dashboard"
        $this->loadViewsFrom(
            module_path('Dashboard', 'Resources/views'),
            'dashboard'
        );
    }

    public function register(): void
    {
        //
    }
}
