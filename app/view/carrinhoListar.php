<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'Ckeckout Final']) ?>


<section class="row">
    <div class="col-md-12">
        <h3 class="text-center mt-5">Checkout Final</h3>
        <hr>
        <?php if (count($carrinho) == 0) : ?>
            <div class="text-center mt-5">
                <h4>Nada no Carrinho!</h4>
                <br>
                <h4>Vamos comprar?
                    <a class="btn btn-warning btn-lg " href="<?php APP_URL ?>" role="button">
                        <i class="fa-solid fa-cart-shopping"></i> Comprar
                    </a>
                </h4>
            </div>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</section>