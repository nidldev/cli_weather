<?php

use App\Command\Controllers\CurrentWeatherController;
use App\Command\WeatherApp;
use PHPUnit\Framework\TestCase;

final class CurrentWeatherControllerTest extends TestCase
{
    /** @test */
    public function can_run_command(): void
    {
        $currentWeather = $this->createMock(CurrentWeatherController::class);
        $currentWeather->expects($this->once())->method("run");

        $app = new WeatherApp();
        $app->runCommand(['./weather','Berlin']);
    }

    /** @test */
    public function should_display_error_message_when_cityid_not_in_range(): void
    {
        //TODO
    }

    /** @test */
    public function should_display_error_message_when_city_does_not_exist(): void
    {
       //TODO
    }

}