<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class EmailService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume authors service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to email api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.email.base_uri');
        $this->secret = config('services.email.secret');
    }


    public function verifyMail()
    {
        return $this->performRequest('GET', '/email');
    }
}