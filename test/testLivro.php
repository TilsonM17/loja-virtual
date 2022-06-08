<?php

namespace TilsonM17\Teste;

use App\models\ImagenLivro;
use PHPUnit\Framework\TestCase;

class testLivro extends TestCase{

    public function testeImagenComLivros(){
            #arrange
          $l = new ImagenLivro(); 
            #act
          $array = $l->mesclarImagemLivros([
           0 =>  [
                "id_livro" => 13,
                "nome_livro" => "O Guia do codigo amador",
                "autor" => "Caelum",
                "data_lancamento" => 2012-04-23,
                "preco" => 10000,
                "ativo" => "Y",
                "quantidade_estoque" => 100,
                "created_at", 
                "update_at" , 
                "deleted_at" ,  
             ],
        1 => [
                "id_livro" => 14,
                "nome_livro" => "Apreenda Python",
                "autor" => "Caelum",
                "data_lancamento" => 2012-04-23,
                "preco" => 17000,
                "ativo" => "N",
                "quantidade_estoque" => 100,
                "created_at", 
                "update_at" , 
                "deleted_at" , 
             ]
         ]);

         #assert
         $this->assertEquals(2, count($array));
    }
}