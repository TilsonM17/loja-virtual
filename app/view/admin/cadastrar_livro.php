<?php

use App\helpers\Func;

$this->layout('_layout', ['title' => 'Area Admin']) ?>

<?= $this->insert("_navbar"); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
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
    <p class="text-center h3">Cadastrar um novo Livro.</p>
    <hr>
    <form method="post" @submit.prevent enctype="multipart/form-data">

        <fieldset>
            <legend>Dados Livros</legend>
            <div class="row">
                <div class="my-2 col-md-6">
                    <label for="">Nome do Livro*</label>
                    <input type="text" name="nome_livro" class="form-control" placeholder="Nome do Livro" id="">
                </div>

                <div class="my-2 col-md-6">
                    <label for="">Data de Lançamento*</label>
                    <input type="date" name="data" class="form-control" placeholder="Descrição" id="">
                </div>
                <div class="my-2 col-md-6">
                    <label for="">Preco*</label>
                    <input type="number" name="preco" class="form-control" placeholder="Quanto custa este Livro?" id="">
                </div>
                <div class="my-2 col-md-6">
                    <label for="">Desconto</label>
                    <input type="number" name="desconto" class="form-control" placeholder="Aplicar Desconto" id="">
                </div>
                <div class="my-2 col-md-12">
                    <label for="">Imagem de Capa</label>
                    <input type="file" name="imagem" class="form-control" id="">
                </div>
            </div>

        </fieldset>
        <hr>
        <fieldset>
            <legend>Complementares</legend>

            <div class="row">
                <div class="my-2 col-md-6">
                    <label for="">Escolha o Autor*</label>
                    <select name="autor" id="" class="form-control">
                        <option class="form-control" value=""></option>
                        <?php foreach ($autores as $autor) : ?>
                            <option class="form-control" value="<?= $autor->GetId() ?>"><?= $autor->GetNomeAutor() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="my-2 col-md-6">
                    <label for="">Escolha a Editora*</label>
                    <select name="editora" id="" class="form-control">
                        <option class="form-control" value=""></option>
                        <?php foreach ($editoras as $editora) : ?>
                            <option class="form-control" value="<?= $editora->GetId() ?>"><?= $editora->GetNomeEditora() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                        
                <div class="my-2">
               <p> 
                 {{categoria}}
               </p> 
                </div>

                <div class="my-2 col-md-12">
                    
                    <label for="">Categoria</label>
                    <input type="text" name="categoria" @keyup.enter = "AddCategoria" v-model="categoria" class="form-control" placeholder="Categoria" id="">
                </div>
            </div>
        </fieldset>

        <hr>

        <fieldset>
            <legend>Finalisar</legend>

            <div class="row">
                <div class="my-2 col-md-12">
                    <label for="">Descrição</label>
                    <textarea name="descricao" class="form-control" id="" cols="20" rows="9" placeholder="Em poucas palavras descreva o Livro">
                    </textarea>
                </div>
            </div>
        </fieldset>

        <hr>

        <div class="mb-5 text-center">
            <button class="btn btn-outline-primary">
                Cadastrar
            </button>
        </div>


    </form>


</main>


<?php $this->start("scripts") ?>
<script src="<?php Func::url('assets/js/vue.min.js') ?>"></script>
<script src="<?php Func::url('assets/js/axios.js') ?>"></script>

<script>
    Vue.config.devtools = true;

    new Vue({
        el:"#app",
        data(){
            return{
                categoria:[]
            }
        },methods:{
           
        }
    });
</script>



<?php $this->stop(); ?>