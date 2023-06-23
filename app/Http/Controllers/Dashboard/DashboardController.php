<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_kendaraan = Kendaraan::all()->count();
        $total_users = User::all()->count();
        $terkonfirmasi = Pemesanan::where('status', 1)->count();
        $pending = Pemesanan::where('status', null)->count();
        $data['total_kendaraan']=$total_kendaraan;
        $data['total_terkonfirmasi'] = $terkonfirmasi;
        $data['total_pending'] = $pending;
        $data['total_users'] = $total_users;

        $sopir = Auth::user()->id;
        $schedule = DB::table('pemesanans as u')->select(
            'u.id_pemesanan as pemesananId',
            'u.nama_pelanggan as pelangganId',
            'u.nama_kendaraan as kendaraan',
            'u.tanggal_ambil as tanggal_ambil',
            'u.tanggal_kembali as tanggal_kembali',
            'u.sopir as sopirId',
            'u.waktu_ambil as waktu_ambil',
            'b.nama as nama_pelanggan', 
        )
        ->leftjoin('users as b', 'b.id', '=', 'u.nama_pelanggan')
        ->where('u.sopir', $sopir)
        ->where('u.status', '=', 2)
        ->get();
   
        return view('dashboard.dashboard',$data,compact('schedule'));
    }

    public function coba(){
        return view('dashboard.coba');
    }
}
