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
            <div class="col-md-12 text-end">
                <a href="<?php Func::url("carrinho/limpar") ?>" class="btn btn-success">Limpar Carrinho</a>
                <a href="<?php echo "http://localhost:8000/" ?>" class="btn btn-warning">Continuar a Comprar.</a>
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
                            <td><?= number_format($value['preco']), " AKZ" ?></td>
                            <td><?= number_format($value['subtotal']), " AKZ" ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" @click="Update(<?= $value['id_livro'] ?>,<?= $value['quantidade'] ?>)" data-bs-toggle="modal" data-bs-target="#actualisar">
                                    <i class="fa fa-pencil" aria-hidden="true"> </i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger" @click="Capturar(<?= $value['id_livro'] ?>)" data-bs-toggle="modal" data-bs-target="#apagar">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>




                </tbody>
            </table>

            <div class="col-md-12 text-center">
                <p class="h2">
                    <?= "<strong>Total da Compra:</strong> " . number_format($_SESSION['total_compra']), " AKZ" ?>
                </p>
            </div>
            <hr>
            <p><strong>*Nota: </strong>Enviaremos no seu email, o Link para Download</p>
            <hr>
            <div class="col-md-2 offset-md-5 mt-4" id="paypal-button-container">
                <!--<button @click.submit="Cadastrar" type="button" class="btn btn-outline-primary">
                    Testar
                </button>-->
            </div>

        <?php endif; ?>
    </div>


</section>

<!-- Modal DELETE -->
<div class="modal fade" id="apagar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="apagarModalLabel">Quero mesmo Eliminar do Carrinho?</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-close" aria-hidden="true"></i> Cancelar
                    </button>
                    <button @click="Apagar" class="btn btn-outline-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i> Apagar.
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>

<!---Region-->
<!-- Modal Actualisar -->
<div class="modal fade" id="actualisar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Actualisar Quantidade.</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="my-3">
                    <label for="">Alterar Quantidade.</label>
                    <input type="number" v-model="qtd" name="qtd" class="form-control" require>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-close" aria-hidden="true"></i> Cancelar
                    </button>
                    <button type="button" @click="UpdateSubmit" class="btn btn-outline-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Actualisar.
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- FIM Modal Create -->
<!-- #endregion -->





<?php $this->start("scripts"); ?>

<script src="https://www.paypal.com/sdk/js?client-id=AQkAmxyzwaR3LaQ4GpmM6yw_oCkdS1Twmrwtdhd7xXSUoS9HSX2PImdl-cRgXbDn1lxeXGYwav9X5Ayg&components=buttons"> </script>
<script src="<?php Func::url('assets/js/vue.min.js') ?>"></script>
<script src="<?php Func::url('assets/js/axios.js') ?>"></script>

<script>
    Vue.config.devtools = true
    const vue = new Vue({
        el: '#app',
        data() {
            return {
                id_valor: null,
                qtd: 0,

                items: []
            }
        },
        mounted() {
            this.CapturarItems()
        },
        methods: {
            Capturar(id) {
                //Capturar o id do botão
                this.id_valor = id
            },
            Apagar() {
                var vue = this;
                axios.post('/carrinho/apagar', {
                        id: vue.id_valor
                    }).then(function(response) {
                        window.location.href = "/carrinho/"
                    })
                    .catch(function(error) {
                        console.log("Erro!");
                    });
            },
            Update(id, qtd) {
                this.qtd = qtd
                this.Capturar(id)
            },
            UpdateSubmit() {
                var vue = this;
                axios.post('/carrinho/update', {
                        id: vue.id_valor,
                        qtd: vue.qtd
                    }).then(function(response) {
                        console.log(response)
                        window.location.href = "/carrinho/"
                    })
                    .catch(function(error) {
                        console.log("Erro!");
                    });
            },
            CapturarItems() {
                var vue = this;
                axios.get('/api/items')
                    .then(function(response) {
                        vue.items = response.data.DATA

                    })
                    .catch(function(error) {
                        console.log("Erro!");
                    });
            }
        }
    });
    //=====================================================================
    paypal.Buttons({
        style: {

            layout: 'horizontal',

            color: 'blue',

            shape: 'pill',

            label: 'pay'

        },
        createOrder: function(data, actions) {

            // This function sets up the details of the transaction, including the amount and line item details.

            return actions.order.create({

                purchase_units: [{

                    amount: {

                        value: "<?= $_SESSION['total_compra'] ?>"

                    }

                }]

            });

        },

        onApprove: function(data, actions) {

            // This function captures the funds from the transaction.
            console.log(actions)
            return actions.order.capture().then(function(details) {

                // This function shows a transaction success message to your buyer.
                axios.post('/carrinho/cadastrar', {
                        items: vue.items,
                    }).then(function(response) {
                        console.log(response)
                        window.location.href = "/carrinho/gratidao"
                    })
                    .catch(function(error) {
                        console.log("Erro!");
                    });

                alert('Transferencia feita com sucesso');

            });

        }

    }).render('#paypal-button-container');

    //This function displays payment buttons on your web page.
</script>


<?php $this->end(); ?>