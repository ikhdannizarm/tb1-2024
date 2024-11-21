<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani login pengguna berdasarkan email atau name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi form login
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah input adalah email atau name
        $loginField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Tentukan kredensial berdasarkan input (email atau name)
        $credentials = [
            $loginField => $request->email,
            'password' => $request->password,
        ];

        // Coba untuk melakukan login
        if (Auth::attempt($credentials)) {
            // Login berhasil, alihkan ke halaman yang diminta
            return redirect()->intended('/');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout pengguna.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
