<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Middleware auth untuk memastikan pengguna sudah login
    // #[Middleware('auth')]
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Halaman untuk user biasa (customer)
    #[Middleware('auth')]
    public function index(): View
    {
        return view('frontend.home');
    }

    // Halaman untuk admin
    #[Middleware('auth')]
    public function adminHome(): View
    {
        return view('admin.index'); // Pastikan Anda memiliki view admin.dashboard
    }

    // Fungsi untuk memeriksa role dan mengarahkan ke dashboard yang sesuai
    public function dashboard(): View
    {
        if (Auth::check()) {
            // Memeriksa apakah user adalah admin
            if (Auth::user()->role === 'admin') {
                return view('admin.index'); // Halaman dashboard admin
            } else {
                return view('frontend.home'); // Halaman dashboard customer
            }
        }

        // Jika tidak ada user yang login, arahkan ke halaman login
        return redirect()->route('login');
    }
}
