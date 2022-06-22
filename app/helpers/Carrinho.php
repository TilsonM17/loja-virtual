<?php

namespace App\helpers;

use Iterator;

class Carrinho
{
    /**
     * @param array carrinho
     */
    private array $carrinho;

    /**
     * @method addNoCarrinho
     * @return array
     */
    public function addNoCarrinho(array $array)
    {
        if (isset($_SESSION['carrinho'])) {
            if (array_key_exists($array['id'], $_SESSION['carrinho'])) {
              $_SESSION['carrinho'][$array['id']]++;
               return;
            } else {
                 array_push($_SESSION['carrinho'],$array['id'] = 1);
                return;
            }
        }
        //Não existe a sessão com o carrinho de compras
        $this->carrinho[$array['id']] = 1;
        $_SESSION['carrinho'] = $this->carrinho;
    }
}
