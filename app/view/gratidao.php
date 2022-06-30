<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'Obrigado']) ?>



<section class="row mt-4">
    <div class="col-md-6 offset-md-4 mt-4">
        <h3>Compra Realisada com sucesso!</h3>
        <p>Obrigado por comprar na <?= APP_NAME ?>, foi enviado no seu email um link para fazer download.</p>
        <img src="<?= APP_URL . 'assets/img/verificado.png' ?>" width="400" height="400" class="img-thumbnail" alt="sdds">

  
    </div>
      <a href="<?= APP_URL ?>" class="btn btn-outline-primary">Voltar</a>
</section>