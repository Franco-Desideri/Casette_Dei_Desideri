<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Installation
{
    public static function install()
    {
        // Carica configurazione
        $config = require(__DIR__ . '/../../config/config.php');

        try {
            // Crea database se non esiste
            $pdo = new PDO("mysql:host=" . $config['host'], $config['user'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . $config['dbname'] . "'");
            $dbExists = $stmt->fetchColumn();

            if (!$dbExists) {
                $pdo->exec("CREATE DATABASE " . $config['dbname']);
            }

            // Connessione al DB creato
            $pdo->exec("USE " . $config['dbname']);

            // Crea EntityManager
            $paths = [__DIR__ . '/../../appORM/models'];
            $isDevMode = true;

            $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
                $paths,
                $isDevMode,
                null,
                null,
                false
            );

            $entityManager = EntityManager::create($config, $doctrineConfig);

            // Crea schema Doctrine
            $schemaTool = new SchemaTool($entityManager);
            $metadata = $entityManager->getMetadataFactory()->getAllMetadata();
            $schemaTool->createSchema($metadata);

            // Esegui il file SQL per popolare i dati
            $sqlPath = __DIR__ . '/../../database/casette_db.sql';
            if (file_exists($sqlPath)) {
                $sql = file_get_contents($sqlPath);
                $pdo->exec($sql);
                echo "Database popolato con successo.\n";
            } else {
                echo "File populate.sql non trovato.\n";
            }

        } catch (PDOException $e) {
            echo "Errore PDO: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Errore Doctrine: " . $e->getMessage();
        }
    }
}
