<?php


namespace App\Middlewares;

use App\helpers\Func;
use Buki\Router\Http\Middleware;

class ValidateSessionAdmin extends Middleware
{

    public function handle()
    {
        if (isset($_SESSION['login_web_id_admin'])) {
              Func::redirect("home");
            return true;
        }

        
        return true;
           

    }
}