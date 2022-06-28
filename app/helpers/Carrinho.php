<?php

namespace App\helpers;

use App\controller\Main;
use Iterator;

class Carrinho
{
    /**
     * @param array carrinho
     */
    private array $carrinho;

    private array $carrinho_completo = [];
    /**
     * @param int Total da compra
     */
    private int $total_compra = 0;

    public function __construct()
    {
        $this->carrinho = $_SESSION['carrinho'] ?? [];
    }
    /**
     * Este metodo é chamado em uma consulta Ajax
     * @method addNoCarrinho
     * @return int Total de items na sessão carrinho 
     */
    public function addNoCarrinho(array $array): int
    {
        if (isset($_SESSION['carrinho'])) {
            if (array_key_exists($array['id'], $_SESSION['carrinho'])) {
                $_SESSION['carrinho'][$array['id']]++;
                return count($_SESSION['carrinho']);
            } else {
                $_SESSION['carrinho'][$array['id']] = 1;
                return count($_SESSION['carrinho']);
            }
        } else {
            //Não existe a sessão com o carrinho de compras
            $this->carrinho[$array['id']] = 1;
            $_SESSION['carrinho'] = $this->carrinho;
            return count($_SESSION['carrinho']);
        }
    }
    /**
     * Transformar aquele array mal feito em
     * um array de com os dados dos respectivos dados
     * Como preço, e o total de compra
     */
    public function transformarCarrinhoEmListaObjectos(): array
    {
        if (count($this->carrinho) == 0 or !isset($_SESSION['carrinho'])) {
            return [];
        }

        foreach ($this->carrinho as $key => $valor) {
            $info = (new EasyPDO())->select("SELECT id_livro,nome_livro,preco FROM vw_livro WHERE id_livro = :id", [':id' => $key]);
            //Adiçionar campo de Subtotal
            $subtotal = ($info[0]['preco'] * $valor);
            $this->total_compra += $subtotal;

            array_push($this->carrinho_completo, array_merge($info[0], ['quantidade' => $valor, 'subtotal' => $subtotal]));
        }
        //Passar os Dados da da variavel para uma sessao
        $_SESSION['total_compra'] = $this->total_compra;
        return $this->carrinho_completo;
    }

    public function carrinhoApagar(array $data)
    {
        unset($_SESSION['carrinho'][$data['id']]);
    }

    public static function limparCarrinho()
    {
        unset($_SESSION['carrinho']);
        unset($_SESSION['total_compra']);
        Func::redirect();
    }

    public function carrinhoUpdate(array $data)
    {
        // [id] => 28
        // [qtd] => 4
        $_SESSION['carrinho'][$data['id']] = $data['qtd'];
    }
}