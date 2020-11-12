<?php

namespace App\Command;

use App\Command\Controllers\CurrentWeatherController;
use App\Command\Controllers\HelpController;

class WeatherApp
{
    protected $printer;
    protected $currentWeatherController;
    protected $helpController;

    public function __construct()
    {
        $this->printer = new Printer();

        $this->currentWeatherController = new CurrentWeatherController($this);
        $this->helpController = new HelpController($this);
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function runCommand(array $argv = [])
    {
        $commandController = !isset($argv[2]) && isset($argv[1]) &&
            $argv[1] !== 'help' && $argv[1] !== '' ?
            $this->currentWeatherController : $this->helpController;

        try {
            call_user_func([$commandController, 'run'], $argv);
        } catch (\Exception $e) {
            $this->getPrinter()->display("ERROR: " . $e->getMessage());
            exit;
        }
    }
}
