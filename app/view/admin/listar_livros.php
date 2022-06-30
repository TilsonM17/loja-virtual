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

  <div class="table-responsive">
    <?php if (isset($_SESSION['_erro'])) : ?>
      <div class="alert alert-danger">
        <p class="text-center h6">
          <?= $_SESSION['_erro'] ?>
        </p>
        <?php unset($_SESSION['_erro']) ?>
      </div>
    <?php elseif (isset($_SESSION['_sucesso'])) : ?>
      <div class="alert alert-success">
        <p class="text-center h6">
          <?= $_SESSION['_sucesso'] ?>
        </p>
        <?php unset($_SESSION['_sucesso']) ?>
      </div>
    <?php endif; ?>




    <?php if (count($livros) == 0) : ?>
      <p class="text-center h2">Não tem livros cadastrados.</p>
      <p class="text-center h3">Deseja adiçionar?
        <a href="<?php Func::url("admin/cadastrar_livros") ?>" class="btn btn-outline-dark">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </p>


    <?php else : ?>
      <a href="<?php Func::url("admin/cadastrar_livros") ?>" class="btn btn-outline-dark">
        <i class="fa fa-plus" aria-hidden="true"></i>
      </a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Nome do Livro</th>
            <th scope="col">Autor</th>
            <th scope="col">Editora</th>
            <th scope="col">Header</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($livros as $livro) : ?>
            <tr>
              <td><?= $livro['nome_livro'] ?></td>
              <td><?= $livro['autor'] ?></td>
              <td><?= $livro['nome_editora'] ?></td>

              <!---data-bs-toggle="modal" data-bs-target="#atualisar"-->
              <td>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#actualisar">
                  <i class="fa fa-pencil" aria-hidden="true"> </i>
                </button>
              </td>
              <td>
                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#apagar">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      <?php endif; ?>
  </div>
</main>
</div>
</div>