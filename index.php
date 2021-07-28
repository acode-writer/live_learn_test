<?php
// namespace App;

// use Router;

include_once("./Autoloader.php");

Autoloader::register();

$router = new Router();

$router->route();

include_once("./views/inedx.php");
