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
        // Redirect ke login jika user belum login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Abort jika role tidak sesuai
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        // Lanjutkan jika validasi lolos
        return $next($request);
    }
}
