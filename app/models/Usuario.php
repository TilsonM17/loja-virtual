<?php

namespace App\models;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @Entity
 * @Table(name="tb_usuarios")
 */

class Usuario{

     /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_usuario`",type="integer")
     */
     private int $id;

     /**
      * @Column(name="`nome`",type="string")
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

      /**
       * @Column(name="`purl`",type="string")
       */
      private string $purl;

      

      public function SetNome($nome){
           $this->nome = htmlspecialchars($nome);
      }

      public function GetNome(){
           return $this->nome;
      }

      public function SetEmail($e){
          $this->email = $e;
     }

     public function GetEmail(){
          return $this->email;
     }

     public function SetSenha($s){
          $this->senha = password_hash($s,PASSWORD_BCRYPT);
      }

     public function GetSenha(){
          return $this->senha;
     }

     public function GetPurl(){
          return $this->purl; 
     }

     public function SetPurl($p){
          $this->purl = $p;
     }
}