<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Login;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    use ApiResponser;
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

        $email = $request->email;
        $login = User::where('email', $email)->first();
    
        if ($login) {
            if ($login->count() > 0) {
                if (Hash::check($request->input('password'), $login->password)) {
                    $api_token = sha1($login->id.time());

                    $create_token = User::where('id', $login->id)->update(['api_token' => $api_token]);
                    
                    $user_data = User::find($login->id);

                    return $this->successResponse($user_data, Response::HTTP_OK);    
                }
                return $this->errorResponse('Invalid password', Response::HTTP_FORBIDDEN);    
            }
            return $this->errorResponse('Invalid credentials', Response::HTTP_FORBIDDEN);    
        }
        return $this->errorResponse('No account found for this email', Response::HTTP_FORBIDDEN);    
    }
}