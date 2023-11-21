<?php

namespace Traits;

trait neofetch
{
    public function neofetch($name, $ver)
    {
        return "OS: " . $name . " " . $ver;
    }
}