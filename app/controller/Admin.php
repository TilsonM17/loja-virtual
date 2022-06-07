<?php

namespace App\controller;

use League\Plates\Engine;
use App\helpers\Func;
use TilsonM17\config\GestorEntidade;
use App\models\Admin as AdminModel;
use App\models\Autor;
use App\models\Editora;
use App\models\Livro;
use Symfony\Component\HttpFoundation\Request;

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
       $resultado = $this->gestor->getRepository(Livro::class)->findAll();

        echo $this->plate->render('listar_livros',['livros' => $resultado] );
      }
      /**Renderiza a lista de autores ja cadastrados */

      public function listarAutores(){
       $resultado = $this->gestor->getRepository(Autor::class)->findAll();

        echo $this->plate->render('listar_autores',['autores' => $resultado] );
      }

      public function cadastrarAutor(){

       (new Autor)->cadastrarAutor(Request::createFromGlobals(),$this->gestor);
       
      }

      public function atualizarAutor($id){
        (new Autor)->atualizarAutor(Request::createFromGlobals(),$this->gestor,$id);
      }

      public function apagarAutor($id_autor){ 
           (new Autor)->apagarAutor(Request::createFromGlobals(),$this->gestor,$id_autor);
      }

      /**Renderizar a lista de Editoras */

      public function listarEditoras(){

        $resultado = $this->gestor->getRepository(Editora::class)->findAll();
        
        echo $this->plate->render("lista_editora",['editoras' => $resultado]);
      }

      public function cadastrarEditora(){
        (new Editora)->cadastrarEditora(Request::createFromGlobals(),$this->gestor);
      } 

      public function logout(){
        session_destroy();
        session_unset();
        Func::redirect("/login");
      }
}