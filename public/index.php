<?php

error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Buki\Router\Router;

 $router = new Router(APP_ROTAS);
 
 $router->get('/', 'Main@index');
 $router->get('/nova_conta',"Main@nova_conta");
 $router->get('/a',"Main@teste");


 $router->run();
 