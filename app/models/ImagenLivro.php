<?php


namespace App\models;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use App\models\Livro;


/**
 * @Entity
 * @Table(name="tb_livro_img")
 */

class ImagenLivro{


        # id_livro_img, id_livro, img_nome

        /**
         * @Id
         * @GeneratedValue
         * @Column(name="`id_livro_img`",type="integer")
         */
        private int $id_livro_img;

         /**
         * 
         * @OneToOne(targetEntity="Livro")
         * @JoinColumn(name="`id_livro`", referencedColumnName="id_livro")
         */
        private $id_livro;


        /**
         * @Column(name="`img_nome`",type="string")
         */
        private string $img_nome;

        # Criar os getter e os setter das propriedades da classe

        public function GetIdLivroImg(){
            return $this->id_livro_img;
        }
        public function GetIdLivro(){
            return $this->id_livro->GetIdLivro();
        }
        public function SetIdLivro(Livro $livro){
            $this->id_livro = $livro;
        }
        public function GetImgNome(){
            return $this->img_nome;
        }
        public function SetImgNome($img_nome){
            $this->img_nome = $img_nome;
        }

     
      
}