<?php

namespace App\Request;

class HttpGet
{
    private $url;
           
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function __invoke()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = json_decode(curl_exec($curl));
        $error    = curl_error($curl);
        $errno    = curl_errno($curl);
        
        if (is_resource($curl)) {
            curl_close($curl);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }
        
        return $response;
    }
}