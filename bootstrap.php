<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/appORM/config/autoloader.php'; // Autoload classi personalizzate

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Carica configurazione DB
$config = require __DIR__ . '/config/config.php';

// Percorso delle entità
$paths = [__DIR__ . '/appORM/models'];
$isDevMode = true;

// Configurazione Doctrine
$doctrineConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

// Crea EntityManager Doctrine
$entityManager = EntityManager::create($config, $doctrineConfig);

// Collega EntityManager al PersistentManager
FPersistentManager::setEntityManager($entityManager);

// Test connessione
try {
    $entityManager->getConnection()->connect();
    echo "Connessione a Doctrine riuscita!";
} catch (\Exception $e) {
    echo "Errore connessione: " . $e->getMessage();
}
