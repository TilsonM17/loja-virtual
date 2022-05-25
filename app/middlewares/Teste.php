<?php 

# Middlewares/FooMiddleware.php
namespace App\Middlewares;

use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;

class Teste extends Middleware
{
  public function handle(Request $request)
  {
      return false;
  }
}