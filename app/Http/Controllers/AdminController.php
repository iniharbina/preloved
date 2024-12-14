<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Menampilkan formulir
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_customer' => 'required|string|max:255',
    //         'email_customer' => 'required|email|unique:user',
    //         'password' => 'required|min:6|confirmed',
    //     ]);

    //     User::create([
    //         'nama_customer' => $request->name,
    //         'email_customer' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'admin', // Tetapkan role sebagai admin
    //     ]);

    //     return redirect()->route('admin')->with('success', 'Admin berhasil ditambahkan.');
    // }
}

