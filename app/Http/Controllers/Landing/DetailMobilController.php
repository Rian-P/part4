<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Kendaraan;

class DetailMobilController extends Controller
{
    public function coba()
    {
      
        
        return view('landing.coba');
    }
    public function index()
    {
       
        return view('landing.detail-mobil',compact('User'));
    }
    public function show($id, $nama_kendaran)
    {
        // Lakukan pengecekan ke database untuk memastikan kecocokan ID dan nama_kendaran
        $kendaraan = Kendaraan::where('id_mobil', $id)
            ->where('nama_kendaran', $nama_kendaran)
            ->first();

        if ($kendaraan) {
            // Jika ada kecocokan, tampilkan data kendaraan
            return view('landing.detail-mobil', ['kendaraan' => $kendaraan]);
        } else {
            // Jika tidak ada kecocokan, lempar pengecualian atau tampilkan halaman kesalahan
            abort(404); // Contoh: Melempar HTTP status 404 (Not Found)
        }
    }

   






    
}