<?php

use App\Command\WeatherApp;
use PHPUnit\Framework\TestCase;

final class WeatherAppTest extends TestCase
{
    /** @test */
    public function can_create_app(): void
    {
        $this->assertInstanceOf(
            WeatherApp::class,
            new WeatherApp
        );
    }

}
