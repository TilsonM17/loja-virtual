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
    
     // Render a template
     echo $this->plate->render('home'); 
    
    
    }
}