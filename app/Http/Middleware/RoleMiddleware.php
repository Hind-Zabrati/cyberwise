<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        dd('Role middleware ok for: ' . auth()->user()->role);
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        abort(403, 'Accès non autorisé');
    }
}
