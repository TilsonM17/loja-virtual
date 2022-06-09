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



  <h2></h2>
  <div class="table-responsive">
    <?php if (count($livros) == 0) : ?>
      <p class="text-center h2">Não tem livros cadastrados.</p>
      <p class="text-center h3">Deseja adiçionar?
        <a href="<?php Func::url("admin/cadastrar_livros")?>"  class="btn btn-outline-dark">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </p>

 
    <?php else : ?>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Header</th>
            <th scope="col">Header</th>
            <th scope="col">Header</th>
            <th scope="col">Header</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1,001</td>
            <td>random</td>
            <td>data</td>
            <td>placeholder</td>
            <td>text</td>
          </tr>
        <?php endif; ?>
  </div>
</main>
</div>
</div>


