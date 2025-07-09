<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EStruttura;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Foundation per gestione Strutture
 */
class FStruttura
{
    /**
     * Trova una struttura per ID
     */
    public static function getStrutturaById(int $id): ?EStruttura
    {
        return FPersistentManager::find(EStruttura::class, $id);
    }

    /**
     * Restituisce tutte le strutture
     */
    public static function getTutteStrutture(): array
    {
        return FPersistentManager::findAll(EStruttura::class);
    }

    /**
     * Salva o aggiorna una struttura
     */
    public static function salvaStruttura(EStruttura $struttura): void
    {
        FPersistentManager::store($struttura);
    }

    /**
     * Rimuove una struttura
     */
    public static function rimuoviStruttura(EStruttura $struttura): void
    {
        FPersistentManager::delete($struttura);
    }
}
