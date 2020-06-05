<?php

namespace App\Http\Controllers\EmailVerification;


use App\Http\Controllers\Controller;
use App\Services\EmailService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the books micro-service
     * @var EmailService
     */
    public $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    /**
     * Get Verification Mail
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyMail()
    {
       // dd("ys");
        return $this->successResponse($this->emailService->verifyMail());
    }

}
