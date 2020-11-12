<?php

namespace App\Command;

class Printer
{
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out(PHP_EOL);
    }


    public function display($message)
    {
        $this->out($message);
        $this->newline();
    }
}