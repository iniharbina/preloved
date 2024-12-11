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
        $input = $request->all();

        // Validasi input login
        $request->validate([
            'email_customer' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login
        if (auth()->attempt(array('email_customer' => $input['email_customer'], 'password' => $input['password']))) {
            // Jika berhasil login, periksa apakah user adalah admin atau customer
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.index');  // Arahkan ke dashboard admin
            } else {
                return redirect()->route('frontend.home');  // Arahkan ke dashboard customer
            }
        } else {
            // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
            return redirect()->route('login')->with('error', 'Email-Address And Password Are Wrong.');
        }
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

    $validatedData['role'] = 'customer';

    // Simpan ke database
    $user = User::create($validatedData);

    if ($user) {
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

    return back()->with('error', 'Registrasi gagal, coba lagi.');
}

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
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
