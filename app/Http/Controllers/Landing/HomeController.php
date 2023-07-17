<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
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

        return view('landing.detail-mobil', compact('detail_kendaraan'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        // Query untuk pencarian mobil berdasarkan keyword
        $kendaraan = Kendaraan::where('nama_kendaraan', 'LIKE', '%'.$keyword.'%')
            ->orWhere('tipe', 'LIKE', '%'.$keyword.'%')
            ->get();

        return view('landing.home', compact('kendaraan'));
    }
}
