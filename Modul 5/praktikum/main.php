<?php
header("Content-Type: application/json; charset=UTF-8");

include "app/Routes/MemeRoutes.php";

use app\Routes\MemeRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$MemeRoute = new MemeRoutes();
$MemeRoute->handle($method, $path);