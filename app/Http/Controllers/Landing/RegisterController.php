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

    // public function store(Request $request){
    //     $users = new User();
    //     $users->nama = $request->input('nama');
    //     $users->email = $request->input('email');
    //     $users->no_hp = $request->input('no_hp');
    //     $users->level = ($request->input('level') === 'User') ? 'User' : 'User';
    //     $users->status = ($request->input('status') === 'Aktif') ? 'Aktif' : 'Akif';
    //     $users->password = $request->input('password');
       
    // $users->save();
    // alert()->success('Berhasil','Akun Berhasil dibuat');
    // return redirect()->route('/login')->with('success',' Data Berhasil Ditambahkan ');
    // }
    public function store(Request $request)
    {
        $existingUser = User::where('email', $request->input('email'))->first();
    
        if ($existingUser) {
           
            alert()->error('Gagal', 'Email sudah digunakan');
            return redirect()->back()->withInput();
        }
    
        $user = new User();
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');
        $user->level = ($request->input('level') === 'User') ? 'User' : 'User';
        $user->status = ($request->input('status') === 'Aktif') ? 'Aktif' : 'Akif';
        $user->password = bcrypt($request->input('password'));
    
        $user->save();
    
        alert()->success('Berhasil', 'Akun berhasil dibuat');
        return redirect()->route('/login')->with('success', 'Data berhasil ditambahkan');
    }
    
   
}
