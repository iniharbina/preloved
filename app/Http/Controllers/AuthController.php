<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $credentials = $request-> only('email_customer', 'password');

        // Validasi input login
        $request->validate([
            'email_customer' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            // Periksa status pengguna setelah login
            if (auth()->user()->status !== 'Aktif') {
                auth()->logout(); // Logout jika status bukan 'Aktif'
                return redirect()->route('login')->with('error', 'Akun Anda tidak aktif.');
            }

            // Jika status aktif, periksa role pengguna
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');  // Arahkan ke dashboard admin
            } else {
                return redirect()->route('customer.dashboard');  // Arahkan ke dashboard customer
            }
        }

        // Jika login gagal
        return redirect()->route('login')->with('error', 'Email atau Password salah.');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request) : RedirectResponse
    {

    $validatedData = $request->validate([
        'nama_customer' => 'required|string|max:50',
        'email_customer' => 'required|email|unique:user,email_customer',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Hash password sebelum disimpan
    $validatedData['password'] = bcrypt($validatedData['password']);

    $validatedData['status'] = 'Aktif';
    $validatedData['role'] = 'customer';

    // Simpan ke database
    $user = User::create($validatedData);

    if ($user) {
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    return back()->with('error', 'Registrasi gagal, coba lagi.');

    }

    /**
     * Write code on Method
     *
      * @return response()
     */
    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view('dashboard');
    //     }

    //     return redirect("login")->withSuccess('Opps! You do not have access');
    // }

    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function create(array $data)
    // {
    //   return User::create([
    //     'nama_customer' => $data['nama_customer'],
    //     'email_customer' => $data['email_customer'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect('login')->with('success','Anda telah logout.');
    }
}
