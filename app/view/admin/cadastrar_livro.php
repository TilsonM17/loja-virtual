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

    <form method="post" action="<?php Func::url("admin/livros_cadastro_submit") ?>" enctype="multipart/form-data">

        <fieldset>
            <legend>Dados Livros</legend>
            <div class="row">
                <div class="my-2 col-md-6">
                    <label for="">Nome do Livro*</label>
                    <input type="text" name="nome_livro" v-model="txt_nome" class="form-control" placeholder="Nome do Livro" require>
                </div>

                <div class="my-2 col-md-6">
                    <label for="">Data de Lançamento*</label>
                    <input type="date" name="data" v-model="txt_data" class="form-control" placeholder="Descrição" require>
                </div>
                <div class="my-2 col-md-6">
                    <label for="">Preco*</label>
                    <input type="number" name="preco" v-model.number="txt_preco" class="form-control" placeholder="Quanto custa este Livro?" require>
                </div>
                <div class="my-2 col-md-6">
                    <label for="">Desconto</label>
                    <input type="number" name="desconto" v-model.number="txt_desconto" class="form-control" placeholder="Aplicar Desconto" require>
                </div>
                <div class="my-2 col-md-12">
                    <label for="">Imagem de Capa</label>
                    <input type="file" name="imagem" v-model="file" class="form-control" accept="image/png, image/gif, image/jpeg" id="" require>
                </div>
            </div>

        </fieldset>
        <hr>
        <fieldset>
            <legend>Complementares</legend>

            <div class="row">
                <div class="my-2 col-md-6">
                    <label for="">Escolha o Autor*</label>
                    <select name="autor" class="form-control" require>
                        <?php foreach ($autores as $autor) : ?>
                            <option class="form-control" value="<?= $autor->GetId() ?>"><?= $autor->GetNomeAutor() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="my-2 col-md-6">
                    <label for="">Escolha a Editora*</label>
                    <select name="editora" class="form-control" require>
                        <?php foreach ($editoras as $editora) : ?>
                            <option class="form-control" value="<?= $editora->GetId() ?>"><?= $editora->GetNomeEditora() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="my-2">
                    <button type="button" class="btn btn-primary my-2" v-for="cat in categoria">
                        {{cat}}
                        <span @click="TrashCategoria(cat)" class="badge bg-secondary">
                            <span aria-hidden="true">&times;</span></span>
                    </button>

                </div>

                <div class="my-2 col-md-6">

                    <label for="">Categoria*</label>
                    <input type="text" :name="arr_categoria" @keyup.enter="AddCategoria" v-model="cat_txt" class="form-control" placeholder="Categoria" id="" require>
                </div>

                <div class="my-2 col-md-6">
                    <label for="">Idade Minima para Ler o Livro*</label>
                    <input type="number" value="5" v-model="txt_idade" name="idade_minima" class="form-control" placeholder="Aplicar Desconto" id="" require>
                </div>
            </div>
        </fieldset>

        <hr>

        <fieldset>
            <legend>Finalisar</legend>

            <div class="row">
                <div class="my-2 col-md-12">
                    <label for="">Descrição</label>
                    <textarea name="descricao" v-model="txt_descricao" require class="form-control" id="" cols="20" rows="9" placeholder="Em poucas palavras descreva o Livro">
                    </textarea>
                </div>
            </div>
        </fieldset>

        <hr>
        <div class="mb-5 text-center">
            <button :disabled="btn" @click="Enviar" :type="postar" class="btn btn-outline-primary">
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

 const vue =  new Vue({
        el: "#app",
        data() {
            return {
                btn: true,
                cat_txt: '',
                categoria: [],
                arr_categoria: [],
                //----------------------------------
                txt_nome: "",
                txt_preco: 100,
                txt_desconto: 0,
                txt_data: undefined,
                file: '',
                txt_idade: 12,
                txt_descricao: "",
                postar:"button",
                //---------------------------------
            }
        },
        watch: {
            txt_nome() {
                this.ValidarInpts();
            },

            txt_preco() {
                this.ValidarInpts();
            },

            txt_desconto() {
                this.ValidarInpts()
            },

            txt_data() {
                this.ValidarInpts();
            },
            cat_txt() {
                this.ValidarInpts();
            }
        },
        methods: {
            ValidarInpts() {
                if (this.txt_nome.length > 0 && this.txt_preco != "" && this.txt_data != "" && this.categoria.length > 0) {
                    this.btn = false;
                } else {
                    this.btn = true;
                }
            },
            AddCategoria() {
                if (this.cat_txt.length == 0 || this.categoria.length == 3) {
                    return
                }

                this.categoria.push(this.cat_txt);
                this.cat_txt = "";

            },
            TrashCategoria(cat) {
                var index = this.categoria.indexOf(cat)
                this.categoria.splice(index, 1);
                
            },
            Enviar() {

                this.arr_categoria = "categoria:"+this.categoria;
                this.postar = "submit";

                <?php sleep(2) ?>

            }
        }
    });
</script>



<?php $this->stop(); ?>