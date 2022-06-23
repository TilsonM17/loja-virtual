<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'Ckeckout Final']) ?>


<section class="row container-fluid">
    <div class="col-md-12">
        <h3 class="text-center mt-5">Checkout Final</h3>
        <hr>
        <?php if (count($carrinho) == 0) : ?>
            <div class="text-center mt-5">
                <h4>Nada no Carrinho!</h4>
                <br>
                <h4>Vamos comprar?
                    <a class="btn btn-warning btn-lg " href="http://localhost:8000/" role="button">
                        <i class="fa-solid fa-cart-shopping"></i> Comprar
                    </a>
                </h4>
            </div>
        <?php else : ?>
            <div class="col-md-12 text-end my-3">
                <a href="<?php Func::url("carrinho/limpar") ?>" class="btn btn-outline-success">Limpar Carrinho</a>
            </div>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Nome do Livro</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço Por Livro</th>
                        <th scope="col">Sub-Total</th>
                        <th scope="col">Actualisar</th>
                        <th scope="col">Eliminar</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($carrinho as $key => $value) : ?>
                        <tr>
                            <th><?= $value['nome_livro'] ?></th>
                            <td><?= $value['quantidade'] ?></td>
                            <td><?= number_format($value['preco'])," AKZ" ?></td>
                            <td><?= number_format($value['subtotal'])," AKZ"?></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#actualisar">
                                    <i class="fa fa-pencil" aria-hidden="true"> </i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#apagar">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>




                </tbody>
            </table>

            <div class="col-md-12 text-center">
                    <p class="h2">
                        <?= "<strong>Total da Compra:</strong> ".number_format($_SESSION['total_compra']), " AKZ" ?>
                    </p>
            </div>
        <?php endif; ?>
    </div>

</section>