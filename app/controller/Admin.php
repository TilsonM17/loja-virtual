<?php

namespace App\controller;

use League\Plates\Engine;
use App\helpers\Func;
use TilsonM17\config\GestorEntidade;
use App\models\Admin as AdminModel;
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

      /** Renderiza a tela de login */
      public function login(){
         echo $this->plate->render('login');
      }
      /** Valida o Login do Admin  */
      public function login_admin_submit(){

       (new AdminModel)->fazerLogin($this->gestor);
      }
      /**Renderiza a lista de livros ja cadastrados */

      public function listarLivros(){
        echo $this->plate->render('listar_livros');
      }

      public function logout(){
        session_destroy();
        session_unset();
        Func::redirect("/login");
      }
}