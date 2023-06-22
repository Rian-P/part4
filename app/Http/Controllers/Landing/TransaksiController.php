<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class TransaksiController extends Controller
{
    
    public function index()
    {
        $nama = Auth::user()->id;
        $data = Pemesanan::where('nama_pelanggan', $nama)->get();
        return view('landing.transaksi',compact('data'));

        // $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        // $data = Pemesanan::where('user_id', $userId)->get(); 
        // return view('landing.transaksi',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::where('id_pemesanan', $id)->first(); 
    
        if ($request->hasFile('bukti_tf')) {
            $file = $request->file('bukti_tf');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->storeAs('image/transfer/', $filename);
            $pemesanan->bukti_tf = $filename;
        }
    
        $pemesanan->status = 1;
        $pemesanan->save(); 
        alert()->success('Berhasil','Bukti TF Berhasil diupload');
        return redirect()->back()->with('success', 'Bukti Transfer berhasil diupload');
    }
    
    

}
