<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(5); 
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        $user = User::all(); 
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_customer' => 'required|max:50',
            'password' => 'required|confirmed|string|min:6',
            'email_customer' => 'required|string|max:30|email|unique:user,email_customer',
            'no_hp' => 'required|string|max:15',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:aktif,non-aktif',
            'role' => 'required|in:admin,customer',
        ]);


        // Menyimpan gambar dengan nama yang unik
        $foto = $request->file('foto');
        $fotoNama = $foto->getClientOriginalName();
        $foto->move(public_path('user'), $fotoNama);

        // Membuat data user baru dan menyimpan ke database
        User::create([
            'nama_customer' => $request->nama_customer,
            'email_customer' => $request->email_customer,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'foto' => $fotoNama,
            'status' => $request->status,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_customer' => 'required|max:50',
            'email_customer' => 'required|string|max:30|email|unique:user,email_customer,' . $id . ',id_user',
            'password' => 'nullable|confirmed|string|min:6',
            'no_hp' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Foto opsional saat update
            'status' => 'required|in:aktif,non-aktif',
            'role' => 'required|in:admin,customer',
        ]);

        $user = User::findOrFail($id);

        $fotoNama = $user->foto;

        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(public_path('user/' . $user->foto))) {
                unlink(public_path('user/' . $user->foto));
            }

            $foto = $request->file('foto');
            $fotoNama = $foto->getClientOriginalName();
            $foto->move(public_path('user'), $fotoNama);
        }

        $user->update([
            'nama_customer' => $validatedData['nama_customer'],
            'email_customer' => $validatedData['email_customer'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'no_hp' => $validatedData['no_hp'],
            'foto' => $fotoNama,
            'status' => $validatedData['status'],
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->route('admin.user.index')->with('error', 'User tidak ditemukan.');
        }
    }
}