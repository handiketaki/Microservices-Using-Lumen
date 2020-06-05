<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class RegisterController extends Controller
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

     /**
     * Store a user information
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
             'username' =>  'required|max:255',
             'email'   =>  'required|email',
        ];
        $this->validate($request, $rules);
 
        $user_data = User::create($request->all());

        if($user_data)
        {
            return $this->successResponse($user_data, Response::HTTP_CREATED);
        }
        return $this->errorResponse($user_data, Response::INTERNAL_SERVER);
        
    }
}