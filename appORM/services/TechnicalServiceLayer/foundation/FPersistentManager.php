<?php

namespace App\services\TechnicalServiceLayer\foundation;

use Doctrine\ORM\EntityManagerInterface;

/**
 * FPersistentManager
 *
 * Classe statica che fornisce un’interfaccia centralizzata per l’accesso
 * all’EntityManager di Doctrine. Consente di eseguire operazioni CRUD
 * in modo semplice e standardizzato in tutta l’applicazione.
 */
class FPersistentManager
{
    /**
     * Istanza statica dell'EntityManager (singleton).
     */
    private static ?EntityManagerInterface $em = null;

    /**
     * Inizializza l'EntityManager.
     * Deve essere chiamato una volta all’avvio dell’app.
     */
    public static function setEntityManager(EntityManagerInterface $entityManager): void
    {
        self::$em = $entityManager;
    }

    /**
     * Restituisce l’EntityManager attualmente attivo.
     * Lancia eccezione se non è stato ancora inizializzato.
     */
    public static function getEntityManager(): EntityManagerInterface
    {
        if (!self::$em) {
            throw new \RuntimeException("EntityManager non inizializzato");
        }
        return self::$em;
    }

    /**
     * Persiste e salva (flush) un'entità nel database.
     * Usata per nuove entità o modifiche a quelle esistenti.
     */
    public static function store(object $entity): void
    {
        self::getEntityManager()->persist($entity);
        self::getEntityManager()->flush();
    }

    /**
     * Rimuove un'entità dal database e applica subito i cambiamenti.
     */
    public static function delete(object $entity): void
    {
        self::getEntityManager()->remove($entity);
        self::getEntityManager()->flush();
    }

    /**
     * Trova una singola entità per chiave primaria (ID).
     */
    public static function find(string $className, $id): ?object
    {
        return self::getEntityManager()->find($className, $id);
    }

    /**
     * Restituisce tutte le entità di una determinata classe.
     */
    public static function findAll(string $className): array
    {
        return self::getEntityManager()->getRepository($className)->findAll();
    }

    /**
     * Trova una lista di entità che soddisfano certi criteri.
     * Opzionalmente, si può indicare l’ordinamento.
     */
    public static function findBy(string $className, array $criteria, array $orderBy = null): array
    {
        return self::getEntityManager()->getRepository($className)->findBy($criteria, $orderBy);
    }

    /**
     * Trova una singola entità che soddisfa i criteri specificati.
     */
    public static function findOneBy(string $className, array $criteria): ?object
    {
        return self::getEntityManager()->getRepository($className)->findOneBy($criteria);
    }

    /**
     * Alias semplificato per accedere direttamente all'EntityManager.
     * Utile per accedere a metodi più avanzati di Doctrine.
     */
    public static function get(): EntityManagerInterface
    {
        return self::getEntityManager();
    }
}
