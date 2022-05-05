<?php

namespace App\helpers;

 class Func{

    public static function url(string $asset){
        echo APP_URL . $asset;
    }

   
 }