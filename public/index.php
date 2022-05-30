<?php

error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
ini_set("display_errors",1);

require_once '../vendor/autoload.php';

use App\helpers\EasyPDO;
use App\helpers\Func;
use App\Middlewares\AuthAdmin;
use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

 $router = new Router(APP_ROTAS);
 
 $router->get('/', 'Main@index');
 $router->get('/nova_conta',"Main@nova_conta");
 $router->post('/nova_conta_submit',"Main@nova_conta_submit");
 $router->get('/confirmar_email',"Main@confirmar_email");
 $router->get('/confirmar_email_submit',"Main@confirmar_email_submit");
 $router->get("/erro_envio_email","Main@erro_envio_email");
 $router->get("/validar_email_submit/:string","Main@validar_email_submit");

 # Areas de login Normal
 $router->get("/login","Main@login");
 $router->post("/login_submit","Main@login_submit");
# Are de Login Administrativa
$router->get("/admin/login","Admin@login",['after'=> ValidateSessionAdmin::class]);
$router->post("/admin/login_admin_submit","Admin@login_admin_submit");


$router->group("/admin",function($router){
   $router->get("/home","Admin@index");
   $router->get("/logout","Admin@logout");
   $router->get("/livros","Admin@listarLivros");
   
},['before' => AuthAdmin::class]);


 $router->get('/a',function(){
    
   Func::printArray($_SESSION);
   
 });

 #Caso haja paginas não encontradas
 $router->notFound(function(Request $request, Response $response) {
      $response->setContent('<center><h1>Página não encontrada</h1></center>');
      return $response;
 });

 $router->run();
 