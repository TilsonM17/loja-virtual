<?php

# Configurações das Rotas

define("APP_ROTAS",[
    'debug' => true,
    'paths' => [
        'controllers' => dirname(__DIR__).'/app/controller',
    ],
    'namespaces' => [
        'controllers' => 'App\\controller\\',
    ],
    'base_folder' => dirname(__DIR__),
    'main_method' => 'index',
]);