<?php

namespace App\models;


use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @Entity
 * @Table(name="tb_autor")
 */

class Autor
{

    /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_autor`",type="integer")
     */
    private int $id_autor;
    /**
     * @Column(name="`nome_autor`",type="string")
     */
    private string $nome_autor;
      /**
      * @Column(name="`sobre_nome`",type="string")
      */
    private $sobre_nome;
}
