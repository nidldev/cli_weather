<?php

use App\Command\WeatherApp;
use PHPUnit\Framework\TestCase;

final class HelpControllerTest extends TestCase
{
    /** @test */
    public function should_display_help_command_when_parameter_is_not_set(): void
    {
        $app = new WeatherApp();

        $app->runCommand(['./weather']);

        $this->expectOutputString('usage: weather your-city'.PHP_EOL);
    }

    /** @test */
    public function should_display_help_command_when_parameter_is_set_but_empty(): void
    {
        $app = new WeatherApp();

        $app->runCommand(['./weather', '']);

        $this->expectOutputString('usage: weather your-city'.PHP_EOL);
    }

    /** @test */
    public function should_display_help_command_when_parameter_is_help(): void
    {
        $app = new WeatherApp();

        $app->runCommand(['./weather', 'help']);

        $this->expectOutputString('usage: weather your-city'.PHP_EOL);
    }

    /** @test */
    public function should_display_help_command_when_there_is_2_parameters(): void
    {
        $app = new WeatherApp();

        $app->runCommand(['./weather', 'not', 'valid']);

        $this->expectOutputString('usage: weather your-city'.PHP_EOL);
    }
}
