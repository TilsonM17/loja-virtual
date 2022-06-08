<?php $this->layout('_layout', ['title' => 'Area Admin']) ?>

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
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"class="btn btn-outline-dark">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
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

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
          <div class="my-3">
             
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
         <i class="fa fa-close" aria-hidden="true"></i> Cancelar
        </button>
        <button type="button" class="btn btn-outline-primary">
        <i class="fa-solid fa-chevron-right"></i> Cadastrar.
        </button>
      </div>
    </div>
  </div>
</div>