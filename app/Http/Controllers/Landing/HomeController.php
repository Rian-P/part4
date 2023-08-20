<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\dataharga;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::inRandomOrder()->take(3)->get();

        return view('landing.home', compact('kendaraan'));
    }

    public function show($id)
    {
        $detail_kendaraan = Kendaraan::findOrFail($id);
        $harga_sopir = dataharga::all();
        return view('landing.detail-mobil', compact('detail_kendaraan','harga_sopir'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

      
        $kendaraan = Kendaraan::where('nama_kendaraan', 'LIKE', '%'.$keyword.'%')
            ->orWhere('tipe', 'LIKE', '%'.$keyword.'%')
            ->get();

        return view('landing.home', compact('kendaraan'));
    }
}
