<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\User;
use App\Models\Pemesanan;

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
        return view('dashboard.dashboard',$data);
    }

    public function coba(){
        return view('dashboard.coba');
    }
}
