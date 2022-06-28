<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'Detalhe do livro']) ?>
<!--Carrega o navbar do site-->
<?= $this->insert('_navbar')
?>


<?php if (count($livro) == 0) : ?>
    <section class="row mt-5">
        <div class="col-md-12 alert alert-danger">
            <h2 class="text-center">Upss!</h2>
            <p class="text-center">Não foi possivel encontrar este livro</p>
            <a class="btn btn-outline-dark text-center" href="<?= APP_URL ?>">Voltar</a>
        </div>
    </section>
<?php else : ?>
    <section class="row container">
        <div class="col-md-6">

            <img src="<?= "../" . IMG_SRC . $livro[0]['img_nome'] ?>" width="400" height="200" class="img-thumbnail" alt="Imagem do Livro">
        </div>
        <div class="col-md-6">
            <h2><?= $livro[0]['nome_livro'] ?></h2>
            <p>Autor : <strong><?= $livro[0]['nome_autor'] . " " . $livro[0]['sobre_nome'] ?></strong> </p>
            <p>Editora : <strong><?= $livro[0]['nome_editora'] ?></strong> </p>
            <p>Data Lançamento : <strong><?= $livro[0]['data_lancamento'] ?></strong> </p>
            <p>Idade Minima para a Leitura : <strong><?= $livro[0]['idade_minima'] ?></strong> </p>
            <hr>
            <p>Preço do Livro : <strong><?= $livro[0]['preco'] ?></strong> </p>
            <p>Descricao : <strong><?= $this->e($livro[0]['descricao']) ?></strong> </p>

            <p>
                <?php
                echo "#{$livro[0]['pri_categoria']}", "  ";
                echo $seg = (!empty($livro[0]['seg_categoria'])) ? "#{$livro[0]['seg_categoria']}" : "", "  ";
                echo $ter = (!empty($livro[0]['ter_categoria'])) ? "#{$livro[0]['ter_categoria']}" : "", "  ";
                ?>
            </p>

            <hr>
            <button class="btn btn-warning btn-lg " href="#" role="button">
                <i class="fa-solid fa-cart-shopping"></i> Comprar
            </button>

            <a class="btn btn-primary btn-lg " href="<?= APP_URL ?>" role="button">
                Voltar
            </a>
        </div>

    </section>
<?php endif; ?>



<?php $this->start("scripts") ?>

<script src="<?php Func::url('assets/js/vue.min.js') ?>"></script>


<script>
    Vue.config.devtools = true
    new Vue({
        el: '#app',
        data() {
            return {
                total_carrinho: 0
            }
        },
        mounted() {
            this.total_carrinho = <?= !isset($_SESSION['carrinho']) ? 0 : count($_SESSION['carrinho']) ?>
        }
    })
</script>



<?php $this->stop(); ?>