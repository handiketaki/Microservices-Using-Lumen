<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Login;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
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

    public function login(Request $request)
    {
        $rules = [
                    'email' => 'required',
                    'password' => 'required|min:8|max:255'
        ];

        $this->validate($request, $rules);

        $credentials = $request->only('email','password');

        
        if(auth()->user())
        {
            dd('login');
        }
        dd('invalid');
    }
}