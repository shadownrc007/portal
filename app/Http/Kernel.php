<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Modules\Core\Http\Middleware\AuditAccessMiddleware::class,
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\CheckUserStatus::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
  protected $routeMiddleware = [
    'auth'             => \Illuminate\Auth\Middleware\Authenticate::class,
    'auth.basic'       => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'cache.headers'    => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can'              => \Illuminate\Auth\Middleware\Authorize::class,
    'guest'            => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
    'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    'signed'           => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle'         => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified'         => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
];


    
}
