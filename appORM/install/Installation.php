<?php

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../bootstrap.php');

use Doctrine\ORM\Tools\SchemaTool;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

class Installation
{
    public static function install()
    {
        $flagPath = __DIR__ . '/../../.installed';

        // Se già installato, non fare nulla
        if (file_exists($flagPath)) {
            return;
        }

        try {
            // Connessione PDO per creare il database
            $db = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifica se il database esiste
            $stmt = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . DB_NAME . "'");
            $existingDatabase = $stmt->fetchColumn();

            // Se non esiste, lo crea
            if (!$existingDatabase) {
                $db->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
                echo "Database creato con successo.\n";
            }

            // Ottieni EntityManager da FPersistentManager
            $entityManager = FPersistentManager::getEntityManager();

            // Aggiorna schema Doctrine
            $schemaTool = new SchemaTool($entityManager);
            $metadata = $entityManager->getMetadataFactory()->getAllMetadata();

            if (!empty($metadata)) {
                $schemaTool->updateSchema($metadata);
                echo "Schema aggiornato con successo.\n";
            } else {
                echo "Nessuna entità trovata per generare lo schema.\n";
            }

            // Segna l'installazione come completata
            file_put_contents($flagPath, 'ok');

        } catch (PDOException $e) {
            echo "Errore PDO: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Errore generale: " . $e->getMessage();
        }
    }
}
