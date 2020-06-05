<?php 

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LoginService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.login.base_uri');
    }

    public function login($data)
    {
        return $this->performRequest('POST','/login',$data);
    }
}