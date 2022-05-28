<?php

namespace App\Middlewares;

use App\helpers\Func;
use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;

class AuthAdmin extends Middleware
{
  /**
   * Se não estiver logado, redireciona para a tela de login
   * Se ja estiver logado vai para a tela de dashboard
   */
  public function handle()
  {
    if (!isset($_SESSION['login_web_id_admin'])) {
        Func::redirect("login");
        return false;
    }
        return true;

  }
}
