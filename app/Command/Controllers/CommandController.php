<?php

namespace App\Command\Controllers;

use App\Command\WeatherApp;

abstract class CommandController
{
    protected $app;

    abstract public function run($argv);

    public function __construct(WeatherApp $app)
    {
        $this->app = $app;
    }

    protected function getApp()
    {
        return $this->app;
    }
}