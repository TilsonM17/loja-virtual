<?php

# Configurações das Rotas

define("APP_ROTAS",[
    'debug' => true,
    'paths' => [
        'controllers' => dirname(__DIR__).'/app/controller',
        'middlewares' => dirname(__DIR__).'/app/middlewares',

    ],
    'namespaces' => [
        'controllers' => 'App\\controller\\',
        'middlewares' => 'App\\Middlewares\\',

    ],
    'base_folder' => dirname(__DIR__),
    'main_method' => 'index',
]);