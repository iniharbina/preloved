<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Jika user login tetapi role tidak sesuai, abort dengan error 403
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki role yang sesuai
        abort(403, 'Unauthorized action.');
    }

}
