<?php
use App\helpers\Func;
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php Func::url("assets/bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?php Func::url("assets/fontawesome/all.css")?>">
    <script src="<?php Func::url("assets/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
    <script src="<?php Func::url("assets/fontawesome/all.min.js")?>"></script>
    
    <title> <?= APP_NAME ?> - <?=$this->e($title)?> </title>
</head>
<body>
<main id="app">

   
    <!--Carrega o conteudo principal do site-->
    <?= $this->section('content')?>

   
    
</main>
    

<?= $this->section("scripts"); ?>
</body>
</html>