<?php

namespace App\controller;

use League\Plates\Engine;
use TilsonM17\config\GestorEntidade;

class Admin{
    
    private $plate;
    private $gestor;

    public function __construct(){
        // Create new Plates instance
        $this->plate = new Engine('../app/view/admin');
        $this->gestor = GestorEntidade::GetEntityManager();
    }

     public function index(){
        echo $this->plate->render('dasboard');
      }
}