<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Entities\Models\AuditLog;

class AuditAccessMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            AuditLog::create([
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'action' => 'access',
            ]);
        }

        return $next($request);
    }
}
