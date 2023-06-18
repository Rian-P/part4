<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        $supir = User::where('level', 'Sopir')->get();
        return view('dashboard.pemesanan',compact('pemesanan','supir'));
    }
    public function insert()
    {
        $kendaraan = Kendaraan::all();
        $sewa = Kendaraan::all();
        $supir = User::where('level', 'Sopir')->get();
        return view('dashboard.insertPemesanan',compact('kendaraan','sewa','supir'));
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

public function approve(Request $request, $id){
    $approve =  DB::table('pemesanans')
                ->where('id_pemesanan', $id)
                ->update([
                    'status' => 2
                ]);

    alert()->success('Berhasil','Data Berhasil diuprove');
    return redirect()->route('order')->with('success','Data Berhasil Diuprove');
}

public function updateSopir(Request $request, $id){
    $sopir = Pemesanan::find($id); 
    $sopir->sopir = $request->input('sopir'); 
    $sopir->save();

    alert()->success('Berhasil','Data Berhasil diupdate');
    return redirect()->route('order')->with('success','Data Berhasil Diuprove');
}


public function hapus($id) {
    $hapus = Pemesanan::find($id);
    if ($hapus) {
        $hapus->delete();
        return redirect()->back()->with('status', 'Data telah dihapus');
    } else {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
}





}
