<?php
namespace Modules\Dashboard\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Dashboard';

    public function boot(): void
    {
        parent::boot();
    }

    public function map(): void
    {
        // Laravel 8+ utiliza routes() en lugar de map(), 
        // pero nwidart lo llama desde el framework base.
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware(['web','auth'])
             ->group(module_path($this->moduleName, 'Routes/web.php'));
    }

    protected function mapApiRoutes(): void
    {
        Route::middleware('api')
             ->prefix('api')
             ->name('api.')
             ->group(module_path($this->moduleName, 'Routes/api.php'));
    }
}
