<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($methods, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
                'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($methods, $requestUrl,['form_params'=>$formParams, 'headers' => $headers]);

        return $response->getBody()->getContents();
    }

}