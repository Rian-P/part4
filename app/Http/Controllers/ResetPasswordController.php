<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index(){
        return view('landing.resetPassword');
    }

    public function resetpassword(){
        return view('landing.konfirmasiPassword');
    }
}
