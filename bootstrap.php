<?php
require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = require __DIR__ . '/config/config.php';

$paths = [__DIR__ . '/appORM/models'];
$isDevMode = true;

$doctrineConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($config, $doctrineConfig);

