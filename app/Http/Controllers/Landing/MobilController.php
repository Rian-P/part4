<?php

namespace App\Http\Controllers\Landing;


use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class MobilController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        
        // Query untuk pencarian mobil berdasarkan keyword
        $kendaraan = Kendaraan::where('nama_kendaraan', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tipe', 'LIKE', '%' . $keyword . '%')
                    ->get();
        
                    return view('landing.mobil',compact('kendaraan'));
    }
   public function index()
   {
      $kendaraan = Kendaraan::all();
      return view('landing.mobil',compact('kendaraan'));
   }

    public function show($id)
    {
        $detail_kendaraan = Kendaraan::findOrFail($id);
        return view('landing.detail-mobil', compact('detail_kendaraan'));
    }

    public function store(Request $request){
        $pemesanan = new Pemesanan();
        $pemesanan->nama_pelanggan = $request->input('id_pelanggan');
        $pemesanan->nama_kendaraan = $request->input('nama_kendaraan');
        $pemesanan->tujuan = $request->input('tujuan');
        $pemesanan->harga_sewa = $request->input('harga_sewa');
        $pemesanan->tanggal_ambil = $request->input('tanggal_ambil');
        $pemesanan->tanggal_kembali = $request->input('tanggal_kembali');
        $pemesanan->sopir = $request->input('sopir');
        $pemesanan->total_harga = $request->input('total_harga');
        $pemesanan->waktu_ambil = $request->input('waktu_ambil');
        $pemesanan->waktu_kembali = $request->input('waktu_kembali');
        $pemesanan->status = null;
        if($request->hasFile('foto_ktp')){
            $file = $request->file('foto_ktp');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('image/ktp/',$filename);
            $pemesanan->foto_ktp = $filename;
        }

        $tgl_sewa = $request->input('tanggal_ambil');
        $tgl_kembali = $request->input('tanggal_kembali');
        


        $cekJadwal = Pemesanan::where(function ($query) use($tgl_sewa, $tgl_kembali) {
            $query->where('tanggal_ambil', '<=', $tgl_kembali)
                ->where('tanggal_kembali', '>=', $tgl_sewa)
                ->orWhere('tanggal_ambil', '<=', $tgl_kembali)
                ->where('tanggal_kembali', '>=', $tgl_kembali)
                ->where('status', 2)
                ->where('nama_kendaraan', 2);
        })->get();   
                
        if ($cekJadwal->isEmpty()) {
            $pemesanan->save();
            alert()->success('Tambah','Data Berhasil Ditambahkan');
            return redirect()->route('mobil.index')->with('success',' Data Berhasil Ditambahkan ');
        }else {
           
            alert()->success('Tambah','JADWAL TIDAK TERSEDIA');
            return redirect()->route('transaksi.index')->with('Warning',' Jadwal Tidak Tersedia ');
        }
       
        
        
        
        
    // $pemesanan->save();
    // alert()->success('Tambah','Data Berhasil Ditambahkan');
    // return redirect()->route('mobil.index')->with('success',' Data Berhasil Ditambahkan ');
}

   
}
