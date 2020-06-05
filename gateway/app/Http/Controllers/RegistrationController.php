<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    use ApiResponser;

    public $registrationService;

    /** 
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct(RegistrationService $registrationService)
     {
         $this->registrationService = $registrationService;
     }
 
      /**
      * Store a user information
      * @param Request $request
      * @return \Illuminate\Http\JsonResponse
      */
      public function store(Request $request)
      {
          return $this->successResponse($this->registrationService->createUser($request->all(), Response::HTTP_CREATED));
      }
}
