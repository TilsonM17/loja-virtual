<?php

declare(strict_types = 1);

use CoffeeCode\Router\Router;

require_once '../vendor/autoload.php';

$router = new Router("http://localhost");

$router->namespace("App\controller");

$router->get("/","Main:index");


if ($router->error()) {
     $router->redirect("/error/{$router->error()}");
}

$router->dispatch();