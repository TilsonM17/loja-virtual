<?php

use App\helpers\Func;

$this->layout("_layout", ["title" => "Fazer Login"]) ?>

<?= $this->insert('_navbar') ?>

<section class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <p class="text-center h3">Login</p>
        </div>
        <hr>
        <?php if (isset($_SESSION['_erro'])) : ?>
            <div class="col-md-4 offset-4 alert alert-danger">
                <p class="h4 text-center "><?= $_SESSION['_erro'] ?></p>
                <?php unset($_SESSION['_erro']) ?>
            </div>
        <?php endif; ?>

        <div class="col-md-4 offset-md-4 my-3">

            <form action="<?php Func::url('login_submit') ?>" method="post">
                <div class="my-4">
                    <label for="">Email:</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="my-4">
                    <label for="">Senha:</label>
                    <input type="password" name="senha" class="form-control">
                </div>

                <div class="my-4">

                    <button type="submit" class="btn btn-outline-primary">Entrar</button>
                </div>
            </form>

        </div>
        <hr>
    </div>
</section>


<?= $this->insert('_footer') ?>