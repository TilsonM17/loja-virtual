<?php

namespace App\controller;

use League\Plates\Engine;


class Main{

    private $plate;
    

    public function __construct()
    {
         // Create new Plates instance
     $this->plate = new Engine('../app/view');

    }

    public function index(){
       echo $this->plate->render('home');
     }

    public function nova_conta(){
        echo $this->plate->render("nova_conta");
    }

    public function teste(){
       
    }
     

    public function error($e){
        echo $this->plate->render("_erro",['e' => $e]);
    }
}