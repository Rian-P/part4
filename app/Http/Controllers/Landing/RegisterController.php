<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


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
        } else if (!checkdnsrr($Domain[1],"MX")){
            alert()->error('Gagal', 'Domain email tidak ditemukan');
            return redirect()->back()->withInput();
        } else{
            alert()->success('Berhasil', 'Akun berhasil dibuat');
            $user = new User();
            $user->nama = $request->input('nama');
            $user->image = 'None';
            $user->email = $request->input('email');
            $user->no_hp = $request->input('no_hp');
            $user->level = ($request->input('level') === 'User') ? 'User' : 'User';
            $user->status = ($request->input('status') === 'Aktif') ? 'Aktif' : 'Akif';
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return redirect()->route('login.index')->with('success', 'Data berhasil ditambahkan');
    }
    
        
    }
    
   
}
