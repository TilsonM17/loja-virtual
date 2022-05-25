<?php

use App\helpers\Func;

 $this->layout('_layout', ['title' => 'User Profile']) ?>
 <!--Carrega o navbar do site-->
 <?= $this->insert('_navbar') ?>

<section class="container">
    <div class="row">
        <div class="col-md 12">
            <p class="text-center h3"> <?=APP_NAME?></p>
        </div>

        <!---------------------------------------------------------------->
        <?php  foreach ($livros as $key => $livro): ?>
         <div class="col-md-4">
             <h2><?= $livro['nome_livro']?></h2>
             <img src="<?= IMG_SRC."".$livro["img_nome"]?>" class="img-fluid img-thumbnail" width="350" height="350" alt="Imagem do produto">
        </div>
        <?php endforeach; ?>

        <!---------------------------------------------------------------->
       
    </div>
</section>

<?= $this->insert('_footer') ?>