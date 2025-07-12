<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;


// Carica configurazione DB
$config = require __DIR__ . '/config/config.php';

// Percorso delle entità
$paths = [__DIR__ . '/appORM/models'];
$isDevMode = true;

// Configura Doctrine
$doctrineConfig = Setup::createAnnotationMetadataConfiguration(
    $paths,
    $isDevMode,
    null,
    null,
    false // <--- disabilita SimpleAnnotationReader
);


// Crea EntityManager
$entityManager = EntityManager::create($config, $doctrineConfig);

// Collega a FPersistentManager
FPersistentManager::setEntityManager($entityManager);
