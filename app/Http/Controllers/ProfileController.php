<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengirimkan data pengguna ke view
        return view('frontend.profile', compact('user'));
    }

    public function edit()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengirimkan data pengguna ke view untuk diedit
        return view('frontend.editprofile', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'email_customer' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'password' => 'nullable|min:6|confirmed', // Validasi password jika ada perubahan
        ]);

        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Update data pengguna
        $user->nama_customer = $request->input('nama_customer');
        $user->email_customer = $request->input('email_customer');
        $user->no_hp = $request->input('no_hp');

        // Cek jika ada perubahan foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                $oldFile = public_path('profile_pictures/' . $user->foto);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            // Simpan foto baru
            $fileName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('profile_pictures'), $fileName);
            $user->foto = $fileName;
        }

        // Cek jika ada perubahan password
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}