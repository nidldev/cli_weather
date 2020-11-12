<?php

use App\Command\WeatherApp;
use PHPUnit\Framework\TestCase;

final class CurrentWeatherControllerTest extends TestCase
{
    /** @test */
    public function should_display_error_message_when_city_does_not_exist(): void
    {
        $app = new WeatherApp();
        $app->runCommand(['./weather', 'does-not-exist']);

        $this->expectOutputString('The city you specified is not listed in OpenWeatherMap or does not exist'.PHP_EOL);
    }

    /** @test */
    public function should_display_error_message_when_cityid_not_in_range(): void
    {
        $app = new WeatherApp();
        $app->runCommand(['./weather', '99']);

        $this->expectOutputString('The city you specified is not listed in OpenWeatherMap or does not exist'.PHP_EOL);
    }
}
