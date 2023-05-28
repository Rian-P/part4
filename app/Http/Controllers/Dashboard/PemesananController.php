<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index()
    {
        $totalPrice = Pemesanan::where('status','=', 1)
                     ->sum('total_harga');
        $formattedPrice = number_format($totalPrice, 2, ',', '.');

        $pemesanan = Pemesanan::all();
        return view('dashboard.pemesanan',compact('pemesanan','formattedPrice'));
    }
    public function insert()
    {
        $kendaraan = Kendaraan::all();
        $sewa = Kendaraan::all();
        return view('dashboard.insertPemesanan',compact('kendaraan','sewa'));
    }

    public function store(Request $request){
        $pemesanan = new Pemesanan();
        $pemesanan->nama_pelanggan = $request->input('nama_pelanggan');
        $pemesanan->nama_kendaraan = $request->input('nama_kendaraan');
        $pemesanan->tujuan = $request->input('tujuan');
        $pemesanan->harga_sewa = $request->input('harga_sewa');
        $pemesanan->tanggal_ambil = $request->input('tanggal_ambil');
        $pemesanan->tanggal_kembali = $request->input('tanggal_kembali');
        $pemesanan->sopir = $request->input('sopir');
        $pemesanan->total_harga = $request->input('total_harga');
        $pemesanan->waktu_ambil = $request->input('waktu_ambil');
        $pemesanan->waktu_kembali = $request->input('waktu_kembali');
        $pemesanan->status = 2;
        if($request->hasFile('foto_ktp')){
            $file = $request->file('foto_ktp');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/ktp/',$filename);
            $pemesanan->foto_ktp = $filename;
        }
        if($request->hasFile('bukti_tf')){
            $file = $request->file('bukti_tf');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/transfer/',$filename);
            $pemesanan->bukti_tf = $filename;
        }
    $pemesanan->save();
    alert()->success('Tambah','Data Berhasil Ditambahkan');
    return redirect()->route('order')->with('success',' Data Berhasil Ditambahkan ');
}

public function approve($id){
    $approve =  DB::table('pemesanans')
                ->where('id_pemesanan', $id)
                ->update([
                    'status' => 2
                ]);
    return redirect()->back()->with('status','Data Telah Diaprove');
}



}
