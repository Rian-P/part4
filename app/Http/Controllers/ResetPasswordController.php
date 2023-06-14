<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index(){
        return view('landing.resetPassword');
    }


    public function resetpassword(Request $request){
        $email = $request->input('email');
        $data = [
            'name' => 'Syahrizal As',
            'body' => 'Testing Kirim Email di Santri Koding',
            'email' => $email
        ];
    
        // Mail::to($email)->send(new SendEmail($data));
        $to_name = ‘RECEIVER_NAME’;
        $to_email = ‘RECEIVER_EMAIL_ADDRESS’;
        // $data = array(‘name’=>”Ogbonna Vitalis(sender_name)”, “body” => “A test mail”);

        Mail::send(‘emails.mail’, $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Test Mail');
        $message->from('SENDER_EMAIL_ADDRESS','Test Mail');
        });
        return view('landing.konfirmasiPassword');
    }
}
