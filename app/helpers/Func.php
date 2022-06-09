<?php

namespace App\helpers;

 class Func{

    public static function url(string $nome_rota){
        echo APP_URL . $nome_rota;
    }

    public static function urlReturrn(string $nome_rota = ""){
        return APP_URL . $nome_rota;
    }

    public static function header():void{
        header('Content-Type: application/json');
    }

    /**
     * Faz um print_r em 1 ou 2 arrays
     */
    public static function printArray(array|object $comp1,array|object|null $comp2 = null) {

        echo "=========================================================================","<pre>";
        echo "<h2>Primeiro Array</h2>";
        echo "<br>";
        print_r($comp1);
       
        if (is_array($comp2) or is_object($comp2)) {
            echo "<hr>";
            echo "<h2>Segundo Array</h2>";
            print_r( $comp2);
            echo "<hr>";
        }
        echo "=========================================================================","<br>";
         die("Esta Consumado");

    }

    public static function redirect(string $rota_name = "/"){
        header("Location: {$rota_name}");
    }

    public static function redirectAdmin(string $rota_name = "home"){
        header("Location: {$rota_name}");
    } 


    public static function purl(int $tamanho = APP_LENGTH):string{
        $str = "ABCDEFGHIJKMNOPQRSTUVXYZaabcdefghijklmnopqrstuvxvyz123456789";
        return substr( str_shuffle($str),0,$tamanho);

    }

    public static function validarEmail(string $email){

        if(filter_var($email,FILTER_VALIDATE_EMAIL) !== false){
            return true;
        }else{
            return false;
        }
    } 

   
 }