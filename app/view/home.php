<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'User Profile']) ?>
<!--Carrega o navbar do site-->
<?= $this->insert('_navbar') ?>


<section class="py-2 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="font-weight-light"><?= APP_NAME ?></h1>
            <p class="lead text-muted">Os Melhores Livros do Mundo em um so Lugar.</p>
            <!-- <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p> -->
        </div>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($livros as  $value) : ?>

                <div class="col">
                    <div class="card shadow-sm">
                        <img  src="<?= $crooper->make(IMG_SRC.$value['img_nome'],300,300) ?>" class="bd-placeholder-img card-img-top" alt="Imagem do Livro" >

                        <div class="card-body">
                            <p class="card-text"><?php $desc = $value['descricao'] ?? "Sem descrição."; echo $desc ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                   
                                </div>
                                <small class="text-muted"><?php echo number_format($value['preco'])."AKZ"?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!---------------------------------------------------------------->
    <?= $this->insert('_footer') ?>