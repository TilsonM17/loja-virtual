<?php  $this->layout("_layout",["title" => "Confirme o seu email"])?>


<section class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <p class="text-center h2">Acabamos de enviar um email de confirmação
            para o email que voçe digitou (<?=$_COOKIE['email'] ?>) <a @click="Mostrar()"> <i class="fa fa-pencil-square" aria-hidden="true"></i> </a>  .</p>

            <p class="text-center h6">Se não aparecer na caixa principal
                ,verifique na sua Caixa de Spam.</p>
            
        </div>

        <div class="col-md-12 mt-5 text-center">
            <a href="" class="btn btn-outline-dark">Voltar</a>
        </div>
    </div>
   
</section>


<?php $this->start('scripts')?>
<script src="assets/js/vue.min.js"></script>
    <script>
        new Vue({
            el:"#app",
             methods:{
                Mostrar(){
                    alert("Ola")
                }
             }
        });
    </script>
<?php $this->stop()?>