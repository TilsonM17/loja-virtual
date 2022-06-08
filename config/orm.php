<?php

namespace TilsonM17\config;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/**
 * Retorna o $entityManager
 */
class GestorEntidade{

    public static function GetEntityManager(){
        $paths = array(dirname(__DIR__) . '/app/models');
        $isDevMode = true;
        
        // the connection configuration
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => DATA_USER,
            'password' => DATA_PASS,
            'dbname'   => DATA_NAME,
        );
        
        $config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);
    
        return $entityManager;
    }
}



