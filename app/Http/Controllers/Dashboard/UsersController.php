<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pemesanan;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.users', compact('users'));
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->nama = $request->input('nama');
        $users->email = $request->input('email');
        $users->no_hp = $request->input('no_hp');
        $users->level = $request->input('level');
        $users->status = $request->input('status');
        $users->password = bcrypt($request->input('password'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/users/', $filename);
            $users->image = $filename;
        }
        $users->save();
        alert()->success('Tambah', 'Data Berhasil Ditambahkan');

        return redirect()->back()->with('status', 'Data Telah Ditambahkan');
    }

   
    public function updateStatus(Request $request, $id)
{    
    // Find the user by ID
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('index')->with('error', 'User not found');
    }

    
    $hasPendingPemesanans = pemesanan::where('nama_pelanggan', $id)->where('status', 2)->exists();

    if ($hasPendingPemesanans) {
        return redirect()->route('index')->with('error', 'User has pending pemesanans with status 3. Cannot update status.');
    }

    
    $user->status = $request->input('status');
    $user->save();

    
    session()->flash('success', 'User status updated successfully');

    // Laravel SweetAlert or any other library
    // alert()->success('Success', 'User status updated successfully');

    return redirect()->route('index')->with('success', 'User status updated successfully');
}

}
