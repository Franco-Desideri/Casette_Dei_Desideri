<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EStruttura;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Foundation per la gestione delle strutture (EStruttura).
 *
 * Questa classe fornisce un'interfaccia centralizzata per operazioni CRUD
 * legate alle entità EStruttura, gestendo automaticamente anche la logica
 * di "soft delete" tramite il flag `cancellata`.
 */
class FStruttura
{
    /**
     * Recupera una struttura dal DB tramite il suo ID, **escludendo quelle cancellate**.
     * 
     * @param int $id ID della struttura da cercare
     * @return EStruttura|null La struttura se trovata e non cancellata, altrimenti null
     */
    public static function getStrutturaById(int $id): ?EStruttura
    {
        $struttura = FPersistentManager::find(EStruttura::class, $id);
        return ($struttura !== null && !$struttura->isCancellata()) ? $struttura : null;
    }

    /**
     * Restituisce tutte le strutture attive (non cancellate) dal database.
     *
     * @return EStruttura[] Array di strutture visibili
     */
    public static function getTutteStrutture(): array
    {
        return FPersistentManager::getEntityManager()
            ->getRepository(EStruttura::class)
            ->findBy(['cancellata' => false]);
    }

    /**
     * Salva o aggiorna una struttura nel database.
     * Utilizza il metodo store() del PersistentManager (persist + flush).
     */
    public static function salvaStruttura(EStruttura $struttura): void
    {
        FPersistentManager::store($struttura);
    }

    /**
     * Effettua una "soft delete" della struttura impostando il flag `cancellata` a true.
     * La struttura non viene rimossa dal database, ma esclusa dalle query visibili.
     */
    public static function rimuoviStruttura(EStruttura $struttura): void
    {
        $struttura->setCancellata(true);
        FPersistentManager::store($struttura);
    }
}
