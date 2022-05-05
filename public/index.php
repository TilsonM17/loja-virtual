<?php

require_once '../vendor/autoload.php';

use Buki\Router\Router;

 $router = new Router(APP_ROTAS);
 
 $router->get('/', 'Main@index');
 
 
 $router->run();
 