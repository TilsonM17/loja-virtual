<?php

namespace App\controller;

use App\helpers\EasyPDO;
use App\helpers\Func;
use TilsonM17\config\GestorEntidade;
use App\models\Autor;

class Api
{

    private $gestor;

    public function __construct()
    {
        // Create new Plates instance
        $this->gestor = GestorEntidade::GetEntityManager();
    }
    public function listarAutores()
    {
        # Criar uma api rest com o header Content-Type: application/json
        # e retornar o resultado em json
        Func::header();
        $resultado =  (new EasyPDO())->select("SELECT * FROM tb_autor");
        
        return $resultado;
    }

    public function listarAutor(int $id)
    {
        Func::header();
        $data =  (new EasyPDO())->select("SELECT * FROM tb_autor WHERE id_autor = :id", [":id" => $id]);

       if (count($data) == 0) {
            $resultado = [
                'MESSAGE' => 'ERRO',
                'STATUS' => '404',
                'DATA' => 'Não encontrado'
            ];
        } else {
            $resultado = [
                'MESSAGE' => 'Sucesso',
                'STATUS' => '200',
                'DATA' => $data
            ];
        }


        return $resultado;
    }
    /**
     * Lista todas editoras 
     */
    public function listarEditoras(){

        Func::header();
        $data =  (new EasyPDO())->select("SELECT * FROM tb_editora");

       if (count($data) == 0) {
            $resultado = [
                'MESSAGE' => 'ERRO',
                'STATUS' => '404',
                'DATA' => 'Não encontrado'
            ];
        } else {
            $resultado = [
                'MESSAGE' => 'Sucesso',
                'STATUS' => '200',
                'DATA' => $data
            ];
        }


        return $resultado;

    }

    /**
     * Retorna a editora passada pelo ID
     * @param int id da editora
     * @return json
     */
    public function listarEditora(int $id){
        Func::header();
        $data =  (new EasyPDO())->select("SELECT * FROM tb_editora WHERE id_editora = :id", [":id" => $id]);

       if (count($data) == 0) {
            $resultado = [
                'MESSAGE' => 'ERRO',
                'STATUS' => '404',
                'DATA' => 'Não encontrado'
            ];
        } else {
            $resultado = [
                'MESSAGE' => 'Sucesso',
                'STATUS' => '200',
                'DATA' => $data
            ];
        }


        return $resultado;
    }
}
