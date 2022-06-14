<?php

namespace App\models;

use App\helpers\Func;
use DateTime;
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
        private $descricao;

        /**
         * @Column(name="`id_autor`",type="integer")
         */
        private $autor;
        /**
         * @Column(name="`id_editora`",type="integer")
         */
        private $editora;
        /**
         * @Column(name="`data_lancamento`", type="datetime")
         */
        private DateTime $data_lancamento;
        /**
         * @Column(name="`preco`",type="integer")
         */
        private $preco;
        /**
         * @Column(name="`desconto`",type="integer")
         */
        private $desconto;
        /**
         * @Column(name="`preco_desconto`",type="integer")
         */
        private $preco_desconto;
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
                $this->data_lancamento = new DateTime($s);
        }
        public function GetDataLancamento()
        {
                return $this->data_lancamento->format("Y-m-d");
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

        public function SetDescricao($desc)
        {
                $this->descricao = trim($desc);
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
                $this->nome_livro = $request->request->get('nome_livro');
                $this->autor = $request->request->get('autor');
                $this->preco = $request->request->get("preco");
                $this->desconto = $request->request->get('desconto');
                $this->editora = $request->request->get('editora');
                $this->SetDataLancamento($request->request->get('data'));
                $this->atribuirValorAsRespectivasCategorias($request->request->get('categoria'));
                $this->idade_minima = $request->request->get('idade_minima');
                $this->SetDescricao($request->request->get("descricao"));
                $this->ativo = "Y";

                $gestor->persist($this);
                $gestor->flush();


                echo "Terminado";
        }

        public function atribuirValorAsRespectivasCategorias(string $categorias)
        {
                $cat = explode(",", $categorias);
                switch (count($cat)) {
                        case 1:
                                $this->SetPriCat($cat[0]);

                                break;
                        case 2:
                                $this->SetPriCat($cat[0]);
                                $this->SetSegCat($cat[1]);

                                break;

                        case 3:
                                $this->SetPriCat($cat[0]);
                                $this->SetSegCat($cat[1]);
                                $this->SetTerCat($cat[2]);

                                break;

                        default:

                                break;
                }
        }
}
