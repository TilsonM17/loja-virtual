<?php

namespace App\Middlewares;

use App\helpers\Func;
use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;

class Auth extends Middleware
{
  /**
   * Se não estiver logado, redireciona para a tela de login
   * Se ja estiver logado vai para a tela de dashboard
   */
  public function handle()
  {
    if (!isset($_SESSION['login_web_id'])) {
        $_SESSION['_erro'] = "Para finalisar a venda,faça login ";
        header("location: /login");
        return false;
    }
        return true;

  }
}
