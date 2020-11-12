<?php

use App\Command\Printer;
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

    /** @test */
    public function can_get_printer(): void
    {
        $app = $this->getMockBuilder(WeatherApp::class)->disableOriginalConstructor()->getMock();
        $app->method("getPrinter")->will($this->returnValue(new Printer));

        $this->assertInstanceOf(Printer::class, $app->getPrinter());
    }

}
