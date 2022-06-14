<?php

namespace App\models;

use App\helpers\Func;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use PhpParser\Node\Expr\Print_;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Entity
 * @Table(name="tb_livro")
 */

class Livro
{

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
        /**
         * @Column(name="`pri_categoria`",type="string")
         */
        private $pri_cat;
        /**
         * @Column(name="`seg_categoria`",type="string")
         */
        private $seg_cat;
        /**
         * @Column(name="`ter_categoria`",type="string")
         */
        private $ter_cat;
        /**
         * @Column(name="`idade_minima`",type="string")
         */
        private $idade_minima;

        private $created_at;
        private $update_at;
        private $deleted_at;


        /**
         * Criar todos os setter e getters das propriedade da classe
         */

        public function GetIdLivro()
        {
                return $this->id_livro;
        }

        public function SetNome($s)
        {
                $this->nome_livro = htmlspecialchars($s);
        }
        public function GetNome()
        {
                return $this->nome_livro;
        }
        public function SetAutor($s)
        {
                $this->autor = $s;
        }
        public function GetAutor()
        {
                return $this->autor;
        }
        public function SetDataLancamento($s)
        {
                $this->data_lancamento = $s;
        }
        public function GetDataLancamento()
        {
                return $this->data_lancamento;
        }
        public function SetPreco($s)
        {
                $this->preco = $s;
        }
        public function GetPreco()
        {
                return $this->preco;
        }
        public function SetAtivo($s)
        {
                $this->ativo = $s;
        }
        public function GetAtivo()
        {
                return $this->ativo;
        }
        public function SetQuantidadeEstoque($s)
        {
                $this->quantidade_estoque = $s;
        }
        public function GetQuantidadeEstoque()
        {
                return $this->quantidade_estoque;
        }

        public function SetPriCat($v)
        {
                $this->pri_cat = $v;
        }
        public function GetPriCat()
        {
                return $this->pri_cat;
        }

        public function SetSegCat($v)
        {
                $this->seg_cat = $v;
        }
        public function GetSegCat()
        {
                return $this->seg_cat;
        }
        public function SetTerCat($v)
        {
                $this->ter_cat = $v;
        }
        public function GetTerCat()
        {
                return $this->ter_cat;
        }




        public function SetCreatedAt($s)
        {
                $this->created_at = $s;
        }
        public function GetCreatedAt()
        {
                return $this->created_at;
        }
        public function SetUpdateAt($s)
        {
                $this->update_at = $s;
        }
        public function GetUpdateAt()
        {
                return $this->update_at;
        }
        public function SetDeletedAt($s)
        {
                $this->deleted_at = $s;
        }
        public function GetDeletedAt()
        {
                return $this->deleted_at;
        }
        public function GetPriCategoria()
        {
                return $this->pri_cat;
        }
        public function GetSegCategoria()
        {
                return $this->seg_cat;
        }
        public function GetTerCategoria()
        {
                return $this->ter_cat;
        }

        public function livrosCadastroSubmit(Request $request, $gestor)
        {
                /***
                 * [imagem] => Symfony\Component\HttpFoundation\File\UploadedFile Object
                (
                    [test:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 
                    [originalName:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 27-272348_docker-logo-png-transparent-png.png
                    [mimeType:Symfony\Component\HttpFoundation\File\UploadedFile:private] => image/png
                    [error:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 0
                    [pathName:SplFileInfo:private] => /tmp/phpAdPLT5
                    [fileName:SplFileInfo:private] => phpAdPLT5
                )
                 */

                /**
                 * [nome_livro] => Docker para Iniciantes
                 * [data] => 2022-06-07
                 * [preco] => 100
                 * [desconto] => 0
                 * [autor] => 1
                 * [editora] => 1
                 * [categoria:tecnologia,Devops] => 
                 * [idade_minima] => 12
                 * [descricao] => dfcfdfdf
                 */
                // id_livro, nome_livro, id_autor, id_editora, data_lancamento, pri_categoria,
                // seg_categoria, ter_categoria, idade_minima, descricao, preco, preco_desconto,
                // desconto, ativo, created_at, update_at
                Func::printArray($request->request->all());
                /*
                 $this->nome_livro = $request->get('nome_livro');
                 $this->autor = $request->get('autor');
                 $this->editora = $request->get('editora');
                 $this->data_lancamento = $request->get('data');
                 $this->pri_cat = $request->get('categoria');
                 */
        }

        public function atribuirValorAsRespectivasCategorias(string $categorias)
        {
                /*
               
Array
(
    [nome_livro] => Docker para Iniciantes
    [data] => 2022-06-01
    [preco] => 5000
    [desconto] => 0
    [autor] => 2
    [editora] => 5
    [categoria] => Tecnologia,Devops,Aruitetura de Sistemas
    [idade_minima] => 12
    [descricao] => Excelente livro para inicinates e não so.
Mas para todo professional de Infraestrutura
)
                 */
                $cat = explode(",", $categorias);
                switch (count($cat)) {
                        case 1:
                                $this->SetPriCat($cat[0]);
                                return "{$this->GetPriCat()}";
                                break;
                        case 2:
                                $this->SetPriCat($cat[0]);
                                $this->SetSegCat($cat[1]);
                                return "{$this->GetPriCat()} - {$this->GetSegCategoria()}";
                                break;

                        case 3:
                                $this->SetPriCat($cat[0]);
                                $this->SetSegCat($cat[1]);
                                $this->SetTerCat($cat[2]);
                                return "{$this->GetPriCat()} - {$this->GetSegCategoria()} - {$this->GetTerCategoria()}";
                                break;

                        default:
                                return false;
                                break;
                }
        }
}
