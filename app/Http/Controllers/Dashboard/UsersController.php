<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users',compact('users'));
    }

    public function store(Request $request){
        $users = new User();
        $users->nama = $request->input('nama');
        $users->email = $request->input('email');
        $users->no_hp = $request->input('no_hp');
        $users->level = $request->input('level');
        $users->status = $request->input('status');
        $users->password = bcrypt($request->input('password'));
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/users/',$filename);
            $users->image = $filename;
        }
    $users->save();
    alert()->success('Tambah','Data Berhasil Ditambahkan');
    return redirect()->back()->with('status','Data Telah Ditambahkan');
    }

}

