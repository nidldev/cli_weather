<?php

namespace App\Command;

class WeatherApp
{
    protected $printer;
    private const OPENWEATHERMAP_APP_ID ='e4e79efe30717b8814947c44240b1310';

    public function __construct()
    {
        $this->printer = new Printer();
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function runCommand(array $argv = [])
    {
        $searchInput = "";
        
        if (isset($argv[1])) {
            $searchInput = $argv[1];
        } else {
            $searchInput = trim(fgets(STDIN));
        }

        $url = 'api.openweathermap.org/data/2.5/weather?q=' . $searchInput .
        '&appid=' . WeatherApp::OPENWEATHERMAP_APP_ID . '&units=metric';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        $this->getPrinter()->display(ucfirst($response->weather[0]->description) . ', ' .
            round($response->main->temp) . ' degrees celsius');
    }
}