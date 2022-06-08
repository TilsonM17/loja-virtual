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

        <div class="col-md-8 offset-md-4 my-3">

            <form action="<?php Func::url('login_submit') ?>" method="post">
                <div class="col-md-6 my-4">
                    <label for="Email">Email:</label>

                    <div v-if="text_email_sms_var">
                        <p class="text-danger"> {{email_val_sms}} </p>
                    </div>
                    <div v-else>
                        <p class="text-success"> {{email_val_sms}} </p>
                    </div>
                    <input type="email" name="email" id="email" v-model="email" :class="email_class" placeholder="Digite o seu Email" required>
                </div>

                <div class="col-md-6 my-4">
                    <label for="Nome">Senha:</label>
                    <input type="password" name="senha" id="senha" v-model="senha" class="form-control" placeholder="Digite a sua Senha" required>
                </div>

                <div class="col-md-6 my-4">
                    <input type="submit" :disabled="botao" class="btn btn-outline-primary" value="Cadastrar">
                </div>
            </form>

        </div>
        <hr>
    </div>
</section>


<?= $this->insert('_footer') ?>





<?php $this->start('scripts') ?>

<script src="assets/js/vue.min.js"></script>
<script>
    // Validar o front-end de cadastro
    new Vue({
        el: '#app',
        data() {
            return {
                email: "",
                senha: "",
                botao: true,
                //=====================================================
                email_validate: false,
                email_validate_sucess: false,
                email_val_sms: "",

                text_email_sms_var: true
                //=====================================================


            }
        },
        computed: {
            email_class() {
                return {
                    'is-valid': this.email_validate_sucess,
                    'is-invalid': this.email_validate,
                    'form-control': true
                }
            }
        },
        watch: {
            email() {

                var padrao = (/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
                if (padrao.test(this.email)) {
                    this.email_validate = false,
                        this.email_validate_sucess = true,
                        this.email_val_sms = "Este email esta disponível"
                    this.text_email_sms_var = false
                    //Saber dos outros campos
                    if (this.senha.length > 0) {
                        this.botao = false
                    }

                } else {
                    this.email_validate = true,
                        this.botao = true
                    this.email_val_sms = "Este email esta Errado"

                }
            },
            senha() {
                if (this.senha.length > 0 && this.email.length > 0) {
                    this.botao = false
                } else {
                    this.botao = true
                }
            }
        }
    });
</script>




<?php $this->stop(); ?>