<?php

namespace App\Command\Controllers;

class HelpController extends CommandController
{
    public function run($argv)
    {
        $this->getApp()->getPrinter()->display("usage: weather your-city");
    }
}
