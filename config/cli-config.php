<?php
/**
 * Configuração da cli do Doctrine ORM
 * 
 */
#!/usr/bin/env php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use TilsonM17\config\GestorEntidade;

// replace with mechanism to retrieve EntityManager in your app

$entityManager = GestorEntidade::GetEntityManager();

$commands = [
    // If you want to add your own custom console commands,
    // you can do so here.
];

ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
    $commands
);