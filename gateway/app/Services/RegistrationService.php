<?php 

namespace App\Services;

use App\Traits\ConsumesExternalService;

class RegistrationService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.registration.base_uri');
    }

    public function createUser($data)
    {
        return $this->performRequest('POST','/register',$data);
    }
}