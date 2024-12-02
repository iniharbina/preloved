<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengirimkan data pengguna ke view
        return view('frontend.profile', compact('user'));
    }
}
