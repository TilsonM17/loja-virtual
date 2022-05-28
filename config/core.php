<?php

/**
 * Arquivo de configuração sobre o ambiente geral de desenvolvimento.
 * Nome do projecto,versão
 */
    
#Inicia a sessao
 session_start();

 define("APP_URL","http://localhost:8000/");

 define("APP_NAME", "BookShoop");

 define("APP_VERSION", 1.0);

 define("APP_COMPANY", "TilsonM17");

 define("DATA_USER","tilsonm17");

 define("DATA_NAME","db_loja");

 define("DATA_PASS","abc123");
  
 define("APP_LENGTH",5);


 define("IMG_SRC","assets/resource/upload/livros/");

  # Require as configuraçes da Rotas
  require_once 'router.php';

  # Require as configurações de Banco de Dados
  require_once 'orm.php';

  #Require as configuraçõs de Email
  require_once 'email.php';