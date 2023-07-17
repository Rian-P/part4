<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('landing.register');
    }

    public function store(Request $request)
    {
        $existingUser = User::where('email', $request->input('email'))->first();
        $email = $request->input('email');
        $Domain = explode('@', $email);

        if ($existingUser) {

            alert()->error('Gagal', 'Email sudah digunakan');

            return redirect()->back()->withInput();
        } elseif (! checkdnsrr($Domain[1], 'MX')) {
            alert()->error('Gagal', 'Domain email tidak ditemukan');

            return redirect()->back()->withInput();
        } else {
            alert()->success('Berhasil', 'Akun berhasil dibuat');
            $user = new User();
            $user->nama = $request->input('nama');
            $user->image = 'None';
            $user->email = $request->input('email');

            $user->level = ($request->input('level') === 'User') ? 'User' : 'User';
            $user->status = ($request->input('status') === 'Aktif') ? 'Aktif' : 'Akif';
            $password = $request->input('password');
            if (! preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
                alert()->error('Gagal', 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, dan satu angka.');

                return redirect()->back()->withInput();
            } else {
                $hashedPassword = bcrypt($password);
                $user->password = $hashedPassword;
            }
            $phone = $request->input('no_hp');

            if (! preg_match('/^\d{11,13}$/', $phone)) {
                alert()->error('Gagal', 'Nomor HP harus terdiri dari 11 sampai 13 digit angka.');

                return redirect()->back()->withInput();
            } else {
                $user->no_hp = $phone;
            }
            $user->save();

            return redirect()->route('login.index')->with('success', 'Data berhasil ditambahkan');
        }
    }
}
