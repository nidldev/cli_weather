<?php

use App\Command\Controllers\HelpController;
use App\Command\WeatherApp;
use PHPUnit\Framework\TestCase;

final class HelpControllerTest extends TestCase
{
    /** @test */
    public function can_run_command(): void
    {
        $help = $this->createMock(HelpController::class);
        $help->expects($this->once())->method("run");

        $app = new WeatherApp();
        $app->runCommand(['./weather','help']);
    }


    /** @test */
    public function should_display_help_command_content_everytime(): void
    {
        //TODO
    }
}
