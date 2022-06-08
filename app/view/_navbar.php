<?php use App\helpers\Func; ?>
 <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mb-4" aria-label="Eleventh navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= APP_NAME ?> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav me-auto  mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="#">Livros</a>
            </li>

            
            <?php if(!isset($_SESSION['login_web_id'])):?>

            <li class="nav-item">
              <a class="nav-link" href="<?php Func::url('nova_conta') ?>">Criar Conta</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php Func::url('login') ?>">Login</a>
            </li>

            <?php else: ?>

            <li class="nav-item">
              <a class="nav-link" href="#">Notificações</a>
            </li>

            <li class="nav-item">
              <a class="nav-link">Minha Conta</a>
            </li>

            <li class="nav-item">
              <a class="nav-link"> <i class="fa-solid fa-right-to-bracket"> </i></a>
            </li>

            <?php endif; ?>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"> <i class="fa-solid fa-cart-shopping"></i>  </a>
            </li>
          </ul>
          <form>
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </div>
    </nav>


