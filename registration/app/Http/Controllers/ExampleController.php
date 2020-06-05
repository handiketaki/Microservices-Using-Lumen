<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class ExampleController extends Controller
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
 
      /**
      * Store a user information
      * @param Request $request
      * @return \Illuminate\Http\JsonResponse
      */
      public function store(Request $request)
      {
            $rules = [
              'username'  =>  'required|max:255',
              'password'  =>  'required|min:8|max:255',
              'email'   =>  'required|email',
            ];
            $this->validate($request, $rules);

            $data['password'] = Hash::make($request->password);
            $data['username'] = $request->username;
            $data['api_token'] = $request->api_token;
            $data['email'] = $request->email;

            $email = User::pluck('email');
            if($email->contains($data['email']))
            {
                return $this->errorResponse('Email Already Exists! Please Login or Enter Another Email.', Response::HTTP_FORBIDDEN);    
            }
            
            $user_data = User::create($data);
            if($user_data)
            {  
              $result = $this->sendmail($data['email']);
            //dd($result);
              if($result=="")
              {
                return $this->successResponse($data, Response::HTTP_CREATED);    
              }
              else {
                return $this->errorResponse("Error! Email not verified.", Response::HTTP_INTERNAL_SERVER);      
              }
                
            }
            return $this->errorResponse("Error! User could not been registered.", Response::HTTP_FORBIDDEN);
      }

        public function sendmail($email)
        {
            $url = 'localhost:8002/email?email='.$email;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
          
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec ($ch);
            $err = curl_error($ch);  //if you need
            curl_close ($ch);
            return $response;
        }
}
