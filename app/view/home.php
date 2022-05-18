<?php $this->layout('_layout', ['title' => 'User Profile']) ?>
 <!--Carrega o navbar do site-->
 <?= $this->insert('_navbar') ?>

<section class="container">
    <div class="row">
        <div class="col-md 12">
            <p class="text-center h3"><?=APP_NAME?></p>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
</section>

<?= $this->insert('_footer') ?>