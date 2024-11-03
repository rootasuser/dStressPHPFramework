<?php

require __DIR__ . '/../vendor/autoload.php';

use dStress\Core\Router;

$router = new Router();
$router->addRoute('/', function() {
    echo "Welcome to dStress PHP Framework!";
});
$router->handleRequest();
