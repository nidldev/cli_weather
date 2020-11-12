<?php

namespace App\Command\Controllers;

use App\Request\HttpGet;

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
        try {
            $response = new HttpGet('api.openweathermap.org/data/2.5/weather?q=' . $city .
                '&appid=' . self::OPENWEATHERMAP_APP_ID . '&units=metric');
        } catch (\RuntimeException $ex) {
            die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
        }

        $currentWeather = isset($response->weather[0]) ?
            ucfirst($response->weather[0]->description) . ', ' .round($response->main->temp) . ' degrees celsius' : 
            'The city you specified is not listed in OpenWeatherMap or does not exist';

        return $currentWeather;
    }
}
