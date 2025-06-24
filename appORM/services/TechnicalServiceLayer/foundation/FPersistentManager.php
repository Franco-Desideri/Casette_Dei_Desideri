<?php

namespace App\services\TechnicalServiceLayer\foundation;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Gestore persistente centralizzato per Doctrine
 */
class FPersistentManager
{
    private static ?EntityManagerInterface $em = null;

    /**
     * Imposta l'EntityManager
     */
    public static function setEntityManager(EntityManagerInterface $entityManager): void
    {
        self::$em = $entityManager;
    }

    /**
     * Restituisce l'EntityManager
     */
    public static function getEntityManager(): EntityManagerInterface
    {
        if (!self::$em) {
            throw new \RuntimeException("EntityManager non inizializzato");
        }
        return self::$em;
    }

    /**
     * Alias di getEntityManager()
     */
    public static function get(): EntityManagerInterface
    {
        return self::getEntityManager();
    }

    /**
     * Salva o aggiorna un'entità
     */
    public static function store(object $entity): void
    {
        self::getEntityManager()->persist($entity);
        self::getEntityManager()->flush();
    }

    /**
     * Rimuove un'entità
     */
    public static function delete(object $entity): void
    {
        self::getEntityManager()->remove($entity);
        self::getEntityManager()->flush();
    }

    /**
     * Trova un'entità per ID
     */
    public static function find(string $className, $id): ?object
    {
        return self::getEntityManager()->find($className, $id);
    }

    /**
     * Restituisce tutte le entità di un certo tipo
     */
    public static function findAll(string $className): array
    {
        return self::getEntityManager()->getRepository($className)->findAll();
    }

    /**
     * Trova entità con criteri specifici
     */
    public static function findBy(string $className, array $criteria, array $orderBy = null): array
    {
        return self::getEntityManager()->getRepository($className)->findBy($criteria, $orderBy);
    }

    /**
     * Trova una sola entità con criteri
     */
    public static function findOneBy(string $className, array $criteria): ?object
    {
        return self::getEntityManager()->getRepository($className)->findOneBy($criteria);
    }
}
