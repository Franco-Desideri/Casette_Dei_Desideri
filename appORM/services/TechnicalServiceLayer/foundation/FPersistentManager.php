<?php

namespace App\services\TechnicalServiceLayer\foundation;
use Doctrine\ORM\EntityManagerInterface;



class FPersistentManager
{
    private static ?EntityManagerInterface $em = null;

    public static function setEntityManager(EntityManagerInterface $entityManager): void
    {
        self::$em = $entityManager;
    }

    public static function getEntityManager(): EntityManagerInterface
    {
        if (!self::$em) {
            throw new \RuntimeException("EntityManager non inizializzato");
        }
        return self::$em;
    }

    public static function store(object $entity): void
    {
        self::getEntityManager()->persist($entity);
        self::getEntityManager()->flush();
    }

    public static function delete(object $entity): void
    {
        self::getEntityManager()->remove($entity);
        self::getEntityManager()->flush();
    }

    public static function find(string $className, $id): ?object
    {
        return self::getEntityManager()->find($className, $id);
    }

    public static function findAll(string $className): array
    {
        return self::getEntityManager()->getRepository($className)->findAll();
    }

    public static function findBy(string $className, array $criteria, array $orderBy = null): array
    {
        return self::getEntityManager()->getRepository($className)->findBy($criteria, $orderBy);
    }

    public static function findOneBy(string $className, array $criteria): ?object
    {
        return self::getEntityManager()->getRepository($className)->findOneBy($criteria);
    }

    public static function get(): EntityManagerInterface
    {
        return self::getEntityManager();
    }

}
