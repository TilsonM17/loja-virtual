<?php

namespace App\models;

use App\helpers\Func;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @Entity
 * @Table(name="tb_admin")
 */

class Admin{

     /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_admin",type="integer")
     */
     private int $id;

     /**
      * @Column(name="`nome_admin`",type="string")
      */
      private string $nome;


     /**
      * @Column(name="`email`",type="string")
      */
      private string $email;


     /**
      * @Column(name="`senha`",type="string")
      */
      private string $senha;


      public function GetId(){
           return $this->id;
      }
      

      public function SetNome($nome){
           $this->nome = htmlspecialchars($nome);
      }

      public function GetNome(){
           return $this->nome;
      }

      public function SetEmail($e){
       if(filter_var($e,FILTER_VALIDATE_EMAIL) !== false){
          # esta bom
          $this->email = $e;
       }else{
            # esta mal
            $this->email = "-1";
       }   
     }

     public function GetEmail(){
          return $this->email;
     }

     /** Usado para cadastro
      *  Ela transforma a senha em uma hash
      */
     public function SetSenha($s){
          $this->senha = password_hash($s,PASSWORD_BCRYPT);
     }

     public function SetSenhaNormal($s){
          $this->senha = $s;
     }

     public function GetSenha(){
          return $this->senha;
     }



     public function fazerLogin(\Doctrine\ORM\EntityManager $gestor){
          
          $this->SetEmail($_POST['email']);
          $this->SetSenhaNormal($_POST['senha']);

         $usuario = $gestor->getRepository(Admin::class)->findOneBy([
               'email' => $this->GetEmail()  
         ]);

         if(!is_object($usuario)){
               $_SESSION['_erro'] = "Email ou senha incorretos";
               Func::redirectAdmin("login");
               return;
          }
          # Se Encontrou um objecto tenho de verificar se a senha bate
         if(!password_verify($this->GetSenha(),$usuario->senha)){
               #Faça algo de errado
               $_SESSION['_erro'] = "As suas credenciais não são válidas";

               Func::redirectAdmin("login");
               return;
         }else{
              #Criar a sessão do USuario
               $_SESSION['login_web_id_admin'] = $usuario->GetId();
               Func::redirectAdmin();
               return;
         }


     }
}