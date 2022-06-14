<?php

namespace TilsonM17\Teste;

use App\models\ImagenLivro;
use App\models\Livro;
use PHPUnit\Framework\TestCase;

class testLivro extends TestCase
{

    /*
    public function testCategoriaLivros()
    {
        #arrange
        $l = new  Livro();

       
        $valor =  $l->atribuirValorAsRespectivasCategorias('Tecnologia,Devops,Arquitetura de Sistemas');
        #assert
        $this->assertEquals("Tecnologia - Devops - Arquitetura de Sistemas", $valor);
        
    }
    */

    public function testCadastrarImagem()
    {
        #arrange
        $l = new ImagenLivro();

        /** */
        //$valor =  $l->atribuirValorAsRespectivasCategorias('Tecnologia,Devops,Arquitetura de Sistemas');
        #assert
       // $this->assertEquals("Tecnologia - Devops - Arquitetura de Sistemas", $valor);
        
    }
}
