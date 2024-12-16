<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Jika role tidak sesuai, arahkan ke dashboard yang sesuai
        if (Auth::user()->role !== $role) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini');
            } elseif (Auth::user()->role === 'customer') {
                return redirect('/customer/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        }

        return $next($request);
    }
}
