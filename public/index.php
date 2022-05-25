<?php

error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
ini_set("display_errors",1);

require_once '../vendor/autoload.php';

use App\Middlewares\Teste;
use Buki\Router\Router;

 $router = new Router(APP_ROTAS);
 
 $router->get('/', 'Main@index');
 $router->get('/nova_conta',"Main@nova_conta");
 $router->post('/nova_conta_submit',"Main@nova_conta_submit");
 $router->get('/confirmar_email',"Main@confirmar_email");
 $router->get('/confirmar_email_submit',"Main@confirmar_email_submit");
 $router->get("/erro_envio_email","Main@erro_envio_email");
 $router->get("/validar_email_submit/:string","Main@validar_email_submit");

 $router->get("/login","Main@login");
 $router->post("/login_submit","Main@login_submit");

$router->group("/admin",function($router){
   $router->get("/","Admin@index");
});


 $router->get('/a',"Main@teste",['before' => Teste::class]);


 $router->run();
 