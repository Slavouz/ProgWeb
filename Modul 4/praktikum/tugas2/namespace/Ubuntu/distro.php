<?php

namespace Ubuntu;

use Kernel\Linux as UbuntuLinux;
use Traits\neofetch;

class distro extends UbuntuLinux
{
    use neofetch;
    public $desktopEnv = "GNOME";
    public $based = "Debian";

    public function getName()
    {
        return "Ubuntu";
    }

    public function getVer()
    {
        return "23.10";
    }

    public function getInfo()
    {
        echo $this->neofetch($this->getName(), $this->getVer()) . "<br/>";
        echo "DE: " . $this->desktopEnv . "<br/>";
        echo "Based on: " . $this->based . "<br/>";
    }
}