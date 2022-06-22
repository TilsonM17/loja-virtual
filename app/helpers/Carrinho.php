<?php

namespace App\helpers;

use Iterator;

class Carrinho
{
    /**
     * @param array carrinho
     */
    private array $carrinho;

    private array $carrinho_completo = [];

    public function __construct()
    {
        $this->carrinho = $_SESSION['carrinho'] ?? [];
    }
    /**
     * @method addNoCarrinho
     * @return array
     */
    public function addNoCarrinho(array $array): int
    {
        if (isset($_SESSION['carrinho'])) {
            if (array_key_exists($array['id'], $_SESSION['carrinho'])) {
                $_SESSION['carrinho'][$array['id']]++;
                return count($_SESSION['carrinho']);
            } else {
                array_push($_SESSION['carrinho'], $array['id'] = 1);
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
    public function transformarCarrinhoEmListaObjectos()
    {
        /*
             [carrinho] => Array
        (
            [27] => 1
            [28] => 2
            [29] => 1
            [30] => 1
        )
        */
        if(count($this->carrinho) == 0 or !isset($_SESSION['carrinho'])){
            return 0;
        }

        foreach($this->carrinho as $key => $valor){
           $info = (new EasyPDO())->select("SELECT * FROM vw_livro WHERE id_livro = :id",[':id' => $key]);
            array_push($this->carrinho_completo,$info[0]);  
        }

        return $this->carrinho_completo;
    }
}
