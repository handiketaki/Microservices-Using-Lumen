<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Login;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\LoginService;

class LoginController extends Controller
{
    use ApiResponser;
    
    public $loginService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {
        return $this->successResponse($this->loginService->login($request->all(),Response::HTTP_OK));
    }
}