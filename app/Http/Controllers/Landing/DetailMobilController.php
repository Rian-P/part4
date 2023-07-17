<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;

class DetailMobilController extends Controller
{
    public function index()
    {

        return view('landing.detail-mobil', compact('User'));
    }
}
