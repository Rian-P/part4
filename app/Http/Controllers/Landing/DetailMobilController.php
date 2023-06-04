<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailMobilController extends Controller
{
   
    public function index()
    {
        return view('landing.detail-mobil',compact('User'));
    }

    
}
