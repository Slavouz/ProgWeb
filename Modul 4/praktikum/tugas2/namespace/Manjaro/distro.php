<?php

namespace Manjaro;

include "abstract/linux.php";

use Kernel\Linux as ManjaroLinux;
use Traits\neofetch;

class distro extends ManjaroLinux
{
    use neofetch;
    public $desktopEnv = "Plasma";
    public $based = "Arch Linux";

    public function getName()
    {
        return "Manjaro";
    }

    public function getVer()
    {
        return "23.0.4";
    }

    public function getInfo()
    {
        echo $this->neofetch($this->getName(), $this->getVer()) . "<br/>";
        echo "DE: " . $this->desktopEnv . "<br/>";
        echo "Based on: " . $this->based . "<br/>";
    }
}