<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('landing.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            // Periksa level pengguna setelah berhasil login
            $user = Auth::user();
            if ($user->level == 'Sopir' || $user->level == 'Admin' || $user->level == 'Super Admin') {
                alert()->success('Berhasil', 'Anda Berhasil Login');

                return redirect('/dashboard');
            } elseif ($user->level == 'User') {
                alert()->success('Berhasil', 'Anda Berhasil Login');

                return redirect('/');
            } else {
                // Level pengguna tidak valid
                Auth::logout();
                Session::flash('error', 'Level pengguna tidak valid');

                return redirect('/login');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');

            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
