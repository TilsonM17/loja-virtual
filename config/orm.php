<?php
// bootstrap.php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/**
 * Retorna o $entityManager
 */

 function GetEntityManager(){
    $paths = array(dirname(__DIR__) . 'app/models');
    $isDevMode = false;
    
    // the connection configuration
    $dbParams = array(
        'driver'   => 'pdo_mysql',
        'user'     => '',
        'password' => '',
        'dbname'   => 'db_loja',
    );
    
    $config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    $entityManager = EntityManager::create($dbParams, $config);

    return $entityManager;
}


