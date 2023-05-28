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
        $nama = Auth::user()->nama;
        $data = Pemesanan::where('nama_pelanggan', $nama)->get();
        return view('landing.transaksi',compact('data'));
    }
}
