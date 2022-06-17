<?php

namespace App\controller;

use App\helpers\EasyPDO;
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

       $resultado = (new EasyPDO() )->select("SELECT * FROM vw_livro");

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

      public function cadastrarLivrosLayout(){

        $autor = $this->gestor->getRepository(Autor::class)->findAll();

        $editora = $this->gestor->getRepository(Editora::class)->findAll();

        echo $this->plate->render("cadastrar_livro",[
          'autores' => $autor,
          'editoras' => $editora
        ]);

      }

      public function livrosCadastroSubmit(){
        (new Livro)->livrosCadastroSubmit(Request::createFromGlobals(),$this->gestor);
      }

      public function cadastrarEditora(){
        (new Editora)->cadastrarEditora(Request::createFromGlobals(),$this->gestor);
      }
      
      public function apagarEditora($id){
        (new Editora)->apagarEditora($this->gestor,$id);
      }
    
      public function actualisarEditora($id){
        (new Editora)->atualizarEditora(Request::createFromGlobals(),$this->gestor,$id);
      }

      public function logout(){
        unset($_SESSION['login_web_id_admin']);
        Func::redirectAdmin();
      }
}