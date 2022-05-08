<?php

/**
 * Arquivo de configuração sobre o ambiente geral de desenvolvimento.
 * Nome do projecto,versão
 */

 define("APP_URL","http://localhost:8000/");

 define("APP_NAME", "Loja Virtual");

 define("APP_VERSION", 1.0);

 define("APP_COMPANY", "TilsonM17");

  # Require as configuraçes da Rotas
  require_once 'router.php';

  # Require as configurações de Banco de Dados
  require_once 'orm.php';

  # Configurar o cli do Doctrine
  //require_once 'cli_config.php';