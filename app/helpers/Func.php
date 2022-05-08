<?php

namespace App\helpers;

 class Func{

    public static function url(string $nome_rota){
        echo APP_URL . $nome_rota;
    }

   
 }