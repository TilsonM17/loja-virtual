<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'Area Admin']) ?>

<?= $this->insert("_navbar"); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestão das Editoras.</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>



  <h2></h2>
  <div class="table-responsive">


    <?php if (isset($_SESSION['_erro'])) : ?>
      <div class="alert alert-danger">
        <p class="text-center h6">
          <?= $_SESSION['_erro'] ?>
        </p>
        <?php unset($_SESSION['_erro']) ?>
      </div>
    <?php elseif (isset($_SESSION['_sucess'])) : ?>
      <div class="alert alert-success">
        <p class="text-center h6">
          <?= $_SESSION['_sucess'] ?>
        </p>
        <?php unset($_SESSION['_sucess']) ?>
      </div>
    <?php endif; ?>


    <?php if (count($editoras) == 0) : ?>
      <p class="text-center h2">Não tem Editoras Cadastradas no Sistema.</p>
      <p class="text-center h3">Deseja adiçionar?

        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-dark">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </button>

      </p>


    <?php else : ?>
      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Editora</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($editoras as $editora) : ?>
            <tr>
              <td><?= $editora->GetId() ?></td>
              <td><?= $editora->GetNomeEditora() ?></td>
              <!---data-bs-toggle="modal" data-bs-target="#atualisar"-->
              <td>


                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#actualisar" @click="Atualisar(<?= $editora->GetId() ?>)">
                  <i class="fa fa-pencil" aria-hidden="true"> </i>
                </button>


              </td>
              <td>
                <button class="btn btn-outline-danger" @click="Capturar(<?= $editora->GetId() ?>)" data-bs-toggle="modal" data-bs-target="#apagar">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>

      <hr>

      <div class="row my-3">
        <div class="col-md-4">
          <?php echo "Total de registros: <strong>" . count($editoras) . "</strong>"; ?>
        </div>
        <div class="col-md-2 offset-6">
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-dark">
            <i class="fa fa-plus" aria-hidden="true"></i>
          </button>
        </div>
      </div>

    <?php endif; ?>
  </div>
</main>
</div>
</div>


<!---Region-->
<!-- Modal Actualisar -->
<div class="modal fade" id="actualisar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Actualisar editora.</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form :action="rota" method="post">
          <div class="my-3">
            <label for="">Primeiro Nome</label>
            <input type="text" name="primeiro_nome" v-model="nome" class="form-control" id="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              <i class="fa fa-close" aria-hidden="true"></i> Cancelar
            </button>
            <button type="submit" :disabled="btn" class="btn btn-outline-primary">
              <i class="fa fa-pencil" aria-hidden="true"></i> Actualisar.
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- FIM Modal Create -->
<!-- #endregion -->





<!---Region-->
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Cadastro de novos editora</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php Func::url('admin/editora/cadastrar') ?>" method="post">
          <div class="my-3">
            <label for="">Nome da Editora</label>
            <input type="text" placeholder="Digite o nome de uma editora valida" name="nome" v-model="nome" class="form-control" id="">
          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              <i class="fa fa-close" aria-hidden="true"></i> Cancelar
            </button>
            <button type="submit" :disabled="btn" class="btn btn-outline-primary">
              <i class="fa-solid fa-chevron-right"></i> Cadastrar.
            </button>

          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- FIM Modal Create -->
<!-- #endregion -->


<!-- Modal DELETE -->
<div class="modal fade" id="apagar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="apagarModalLabel">Deseja Apagar este Registro?</h5>

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
<!-- FIM Modal DELETE -->






<?php $this->start("scripts") ?>

<script src="<?php Func::url('assets/js/vue.min.js') ?>"></script>
<script src="<?php Func::url('assets/js/axios.js') ?>"></script>

<script>

  Vue.config.devtools = true

  new Vue({
    el: '#app',
    data() {
      return {
        nome: '',
        rota:'',
        btn: true,
        id_valor: null,
        retorno: []
      }
    },
    /**Colocar waths não metodo para validar os campos de entrada */
    watch: {
      nome: function() {
         if (this.nome.length > 0) {
           this.btn = false;
         }else{
           this.btn = true;
         }
      }
    },
    methods: {
      Capturar(id) {
        //Capturar o id do botão
        this.id_valor = id
      },
      Apagar() {

        console.log(this.id_valor);
        window.location.href = "<?php Func::url('admin/editora/apagar/') ?>" + this.id_valor;
      },
      Atualisar(id) {

        vue = this;

        axios.get('/api/editora$editora/' + id)
          .then(function(response) {
            //console.log();
            //vue.nome_1 = response.data.DATA[0].nome_editora$editora;
            //vue.nome_2 = response.data.DATA[0].sobre_nome;
          //  vue.rota = "<?php Func::url("admin/editora/atualizar/")?>" + response.data.DATA[0].id_editora$editora;
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          })
          .then(function() {
            // always executed
          });

      }
    }


  })
</script>



<?php $this->stop(); ?>