<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $nama = Auth::user()->id;
       

        $data = DB::table('pemesanans as u')->select(
            'u.id_pemesanan as id_pemesanan',
            'u.nama_pelanggan as pelangganId',
            'b.nama as nama_pelanggan',
            'u.nama_kendaraan as nama_kendaraan',
            'u.tanggal_ambil as tanggal_ambil',
            'u.tanggal_kembali as tanggal_kembali',
            'u.bukti_tf as bukti_tf',
            'u.total_harga as total_harga',
            'u.status as status',
            'u.waktu_ambil as waktu_ambil',
        )
            ->leftjoin('users as b', 'b.id', '=', 'u.nama_pelanggan')
            ->where('b.id', $nama)
            ->get();

        return view('landing.transaksi', compact('data'));
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
        alert()->success('Berhasil', 'Bukti TF Berhasil diupload');

        return redirect()->back()->with('success', 'Bukti Transfer berhasil diupload');
    }
}
