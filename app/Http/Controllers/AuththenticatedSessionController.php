<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuththenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email_customer' => 'required|email_customer',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email_customer', 'password'))) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('/admin');
            } elseif ($role === 'customer') {
                return redirect()->route('frontend.home');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
