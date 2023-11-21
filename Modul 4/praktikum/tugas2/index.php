<?php

include "Traits/neofetch.php";
include "namespace/Manjaro/distro.php";
include "namespace/Ubuntu/distro.php";

use Manjaro\distro as Manjaro;
use Ubuntu\distro as Ubuntu;

echo "user@manjaro-pc > neofetch <br/>";
echo "------------------<br/>";
$manjaro = new Manjaro;
$name = $manjaro->getInfo();
echo "user@manjaro-pc > shutdown <br/>";
echo "<br/>";

echo "user@ubuntu-pc > neofetch <br/>";
echo "------------------<br/>";
$ubuntu = new Ubuntu();
$ubuntu->getInfo();
echo "<br/>";
