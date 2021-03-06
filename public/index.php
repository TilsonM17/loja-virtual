<?php

error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);

require_once '../vendor/autoload.php';

use App\helpers\EasyPDO;
use App\helpers\Func;
use App\Middlewares\Auth;
use App\Middlewares\AuthAdmin;
use Buki\Router\Router;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$router = new Router(APP_ROTAS);

$router->get('/', 'Main@index');
$router->get('/nova_conta', "Main@nova_conta");
$router->post('/nova_conta_submit', "Main@nova_conta_submit");
$router->get('/confirmar_email', "Main@confirmar_email");
$router->get('/confirmar_email_submit', "Main@confirmar_email_submit");
$router->get("/erro_envio_email", "Main@erro_envio_email");
$router->get("/validar_email_submit/:string", "Main@validar_email_submit");
$router->get("/detalhe/:string", "Main@detalheLivro");
$router->get("/logout", "Main@logout");

#======================================
# CARRINHO DE COMPRAS
$router->post("/carrinho/add", "Main@carrinhoAdd");

$router->group("/carrinho", function ($router) {
  $router->get("/","Main@carrinhoListar");
  $router->get("/limpar","Main@carrinhoLimpar");
  
  $router->post("/apagar", "Main@carrinhoApagar");
  $router->post("/update", "Main@carrinhoUpdate");
  $router->post("/cadastrar", "Main@carrinhoCadastrar");
  $router->get("/gratidao", "Main@gratidao");


},['before' => Auth::class]);

#======================================

# Areas de login Normal
$router->get("/login", "Main@login");
$router->post("/login_submit", "Main@login_submit");
# Are de Login Administrativa
$router->get("/admin/login", "Admin@login", ['before' => ValidateSessionAdmin::class]);
$router->post("/admin/login_admin_submit", "Admin@login_admin_submit");

$router->group("/admin", function ($router) {
  $router->get("/home", "Admin@index");
  $router->get("/logout", "Admin@logout");
  $router->get("/livros", "Admin@listarLivros");
  $router->get("/editora", "Admin@listarEditoras");
  $router->get("/autor", "Admin@listarAutores");
  $router->get("/autor/apagar/:id", "Admin@apagarAutor");
  $router->get("/editora/apagar/:id", "Admin@apagarEditora");
  $router->get("/cadastrar_livros", "Admin@cadastrarLivrosLayout");
  #--------------------------------------------------------------------
  $router->post("/autor/cadastrar", "Admin@cadastrarAutor");
  $router->post("/editora/cadastrar", "Admin@cadastrarEditora");
  $router->post("/editora/atualizar/:id", "Admin@actualisarEditora");
  $router->post("/livros_cadastro_submit", "Admin@livrosCadastroSubmit");
  $router->post("/autor/atualizar/:id", "Admin@atualizarAutor");
  #--------------------------------------------------------------------

}, ['before' => AuthAdmin::class]);


# Criar um grupo para api de autores, livros e etc
$router->group("/api", function ($router) {
  $router->get("/autores", "Api@listarAutores");
  $router->get("/autor/:id", "Api@listarAutor");
  $router->get("/editoras", "Api@listarEditoras");
  $router->get("/editora/:id", "Api@listarEditora");
  $router->get("/items", "Api@capturarItems");
});


$router->get('/a', function () {
  #session_unset();
  #session_unset();
  $_ = (new EasyPDO)->select("SELECT MAX(id_compra) AS id FROM tb_compra;");
 Func::printArray($_);
 
});


#Caso haja paginas n??o encontradas
$router->notFound(function (Request $request, Response $response) {
  $response->setContent('<center><h1>P??gina n??o encontrada</h1></center>');
  return $response;
});

$router->run();
