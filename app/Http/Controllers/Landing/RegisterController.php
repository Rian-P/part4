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

    public function store(Request $request){
        $users = new User();
        $users->nama = $request->input('nama');
        $users->email = $request->input('email');
        $users->no_hp = $request->input('no_hp');
        $users->level = ($request->input('level') === 'User') ? 'User' : 'User';
        $users->status = ($request->input('status') === 'Aktif') ? 'Aktif' : 'Akif';
        $users->password = $request->input('password');
       
    $users->save();
    alert()->success('Tambah','Data Berhasil Ditambahkan');
    return redirect()->route('login.index')->with('success',' Data Berhasil Ditambahkan ');
    }

   
}
