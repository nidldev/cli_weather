<?php

namespace App\Command\Controllers;

class CurrentWeatherController extends CommandController
{
    private const OPENWEATHERMAP_APP_ID = 'e4e79efe30717b8814947c44240b1310';

    public function run($argv)
    {
        //TODO test if integer

        $this->getApp()->getPrinter()->display($this->getCurrentWeather($argv[1]));
    }

    private function getCurrentWeather(string $city)
    {
        $url = 'api.openweathermap.org/data/2.5/weather?q=' . $city .
        '&appid=' . self::OPENWEATHERMAP_APP_ID . '&units=metric';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        return ucfirst($response->weather[0]->description) . ', ' .
            round($response->main->temp) . ' degrees celsius';
    }
}
