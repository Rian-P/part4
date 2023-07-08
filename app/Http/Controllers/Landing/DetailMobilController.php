<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Kendaraan;

class DetailMobilController extends Controller
{
    
    public function index()
    {
       
        return view('landing.detail-mobil',compact('User'));
    }
    
    
}