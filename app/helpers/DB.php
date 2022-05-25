<?php

namespace App\helpers;

use Doctrine\ORM\Query\ResultSetMapping;
use App\models\ImagenLivro;
use App\models\Livro;



class DB
{

    public static function selectNative(string $sql, \Doctrine\ORM\EntityManager $gestor)
    {
        $rsm = new ResultSetMapping();
        // build rsm here
        // id_livro, nome_livro, autor, preco, quantidade_estoque, img_nome
        $rsm->addEntityResult(ImagenLivro::class, 'i');
        $rsm->addFieldResult('i', 'img_nome', 'img_nome');
       // $rsm->addFieldResult('i', 'id_livro', 'id_livro');

        #====================================================
        $rsm->addJoinedEntityResult(Livro::class, 'l', 'i', 'id_livro');
        $rsm->addFieldResult('l', 'id_livro', 'id_livro');
        $rsm->addFieldResult('l', 'nome_livro', 'nome_livro');
        $rsm->addFieldResult('l', 'autor', 'autor');
        $rsm->addFieldResult('l', 'preco', 'preco');
        $rsm->addFieldResult('l', 'quantidade_estoque', 'quantidade_estoque');

        $query = $gestor->createNativeQuery($sql, $rsm);

        return $query->getResult();
    }
}
