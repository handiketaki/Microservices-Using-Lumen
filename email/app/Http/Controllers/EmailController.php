<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyMail;
use App\User;

class EmailController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function verifyMail(Request $request)
    {
       $email = $request->email;
       $body = "<div>Hello,</div>
                <div>Your account is been registered successfully.</div>
                <div>Please click the below button to verify the account.</div>
                <div><a href='/verified' class='btn'>Verify The Account</div>";
       
       $mail = Mail::send([],[],function($message) use ($email, $body){
            $message->to($email)
                    ->subject("Mail verification")
                    ->setBody($body);
       });

       if($mail!=false)
       {
           dd('success');
       }
    }
}
