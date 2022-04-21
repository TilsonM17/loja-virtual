<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
    <title> <?= APP_NAME ?> - <?=$this->e($title)?> </title>
</head>
<body>
<main id="app">

    <!--Carrega o navbar do site-->
   <?= $this->insert('_navbar') ?>
    <!--Carrega o conteudo principal do site-->
    <?= $this->section('content')?>
</main>
    
</body>
</html>