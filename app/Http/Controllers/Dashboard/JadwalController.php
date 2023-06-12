<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use PDF;
use Carbon\Carbon;



use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function pemasukan(){
        $totalPrice = Pemesanan::where('status','=', 2)
                     ->sum('total_harga');
        $formattedPrice = number_format($totalPrice, 2, ',', '.');

        $pemesanan = Pemesanan::all();
        return view('dashboard.pemasukan',compact('pemesanan','formattedPrice'));
    }

    public function index()
    {
        $jadwal =  DB::table('pemesanans')
        ->where('status', '=', 2)
        ->get();
        
        return view('dashboard.jadwal',compact('jadwal'));
    }
    
    public function coba()
    {
        return view('dashboard.coba');
    }

    public function kwitansi($id)
    { 
        $kwitansi = Pemesanan::where('id_pemesanan', $id)->first();
        $ambil = Carbon::parse($kwitansi->tanggal_ambil);
        $kembali = Carbon::parse($kwitansi->tanggal_kembali);
        $selisih = $ambil->diffInDays($kembali);
        $kwitansi->selisih_hari = $selisih;
    
        $pdf = PDF::loadView('dashboard.kwitansi', ['latter' => $kwitansi]);
        return $pdf->stream('Kwitansi');
    }
    
}
