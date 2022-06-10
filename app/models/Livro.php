<?php

namespace App\models;


use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @Entity
 * @Table(name="tb_livro")
 */

class Livro{

     /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_livro`",type="integer")
     */
        private $id_livro;

        /**
         * @Column(name="`nome_livro`",type="string")
         */
        private $nome_livro;

        /**
         * @Column(name="`descricao`",type="string")
         */
        private $assunto;

        /**
         * @Column(name="`id_autor`",type="int")
         */
        private $autor;
         /**
         * @Column(name="`id_editora`",type="int")
         */
        private $editora;
        /**
         * @Column(name="`data_lancamento`")
         */
        private $data_lancamento;
        /**
         * @Column(name="`preco`",type="integer")
         */
        private $preco;
        /**
         * @Column(name="`ativo`")
         */
        private $ativo;
        
        private $created_at;
        private $update_at;
        private $deleted_at;

    
        /**
         * Criar todos os setter e getters das propriedade da classe
         */

         public function GetIdLivro(){
           return $this->id_livro;
         }

        public function SetNome($s){
                $this->nome_livro = htmlspecialchars($s);
        }
        public function GetNome(){
                return $this->nome_livro;
        }
        public function SetAutor($s){
                $this->autor = htmlspecialchars($s);
        }
        public function GetAutor(){
                return $this->autor;
        }
        public function SetDataLancamento($s){
                $this->data_lancamento = $s;
        }
        public function GetDataLancamento(){
                return $this->data_lancamento;
        }
        public function SetPreco($s){
                $this->preco = $s;
        }
        public function GetPreco(){
                return $this->preco;
        }
        public function SetAtivo($s){
                $this->ativo = $s;
        }
        public function GetAtivo(){
                return $this->ativo;
        }
        public function SetQuantidadeEstoque($s){
                $this->quantidade_estoque = $s;
        }
        public function GetQuantidadeEstoque(){
                return $this->quantidade_estoque;
        }
        public function SetCreatedAt($s){
                $this->created_at = $s;
        }
        public function GetCreatedAt(){
                return $this->created_at;
        }
        public function SetUpdateAt($s){
                $this->update_at = $s;
        }
        public function GetUpdateAt(){
                return $this->update_at;
        }
        public function SetDeletedAt($s){
                $this->deleted_at = $s;
        }
        public function GetDeletedAt(){
                return $this->deleted_at;
        }

        /**
         * Metodo que vai fazer selecte em todos os livros
         * E fazer um array com todos os livros
         * Junto deste array vai retornar a imagem destes livros.
         */ 
         
        public function selecionaLivrosImagens(){

        }

     
}