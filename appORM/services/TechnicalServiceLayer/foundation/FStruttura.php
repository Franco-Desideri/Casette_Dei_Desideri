<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EStruttura;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Foundation per gestione Strutture
 */
class FStruttura
{
    /**
     * Trova una struttura per ID, solo se non cancellata
     */
    public static function getStrutturaById(int $id): ?EStruttura
    {
        $struttura = FPersistentManager::find(EStruttura::class, $id);
        return ($struttura !== null && !$struttura->isCancellata()) ? $struttura : null;
    }

    /**
     * Restituisce tutte le strutture non cancellate
     */
    public static function getTutteStrutture(): array
    {
        return FPersistentManager::getEntityManager()
            ->getRepository(EStruttura::class)
            ->findBy(['cancellata' => false]);
    }

    /**
     * Salva o aggiorna una struttura
     */
    public static function salvaStruttura(EStruttura $struttura): void
    {
        FPersistentManager::store($struttura);
    }

    /**
     * Soft-delete: marca la struttura come cancellata
     */
    public static function rimuoviStruttura(EStruttura $struttura): void
    {
        $struttura->setCancellata(true);
        FPersistentManager::store($struttura);
    }
}

