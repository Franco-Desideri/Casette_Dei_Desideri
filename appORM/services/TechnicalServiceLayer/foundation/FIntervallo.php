<?php

namespace App\services\TechnicalServiceLayer\foundation;

class FIntervallo
{
    /**
     * Crea un intervallo solo se non si sovrappone ad altri nella stessa struttura
     */
    public static function creaIntervallo(EIntervallo $intervallo): bool
    {
        $struttura = $intervallo->getStruttura();
        $nuovoInizio = $intervallo->getDataI();
        $nuovaFine = $intervallo->getDataF();

        foreach ($struttura->getIntervalli() as $esistente) {
            if ($esistente === $intervallo) {
                continue; // evita confronto con se stesso
            }

            $esistenteInizio = $esistente->getDataI();
            $esistenteFine = $esistente->getDataF();

            // verifica sovrapposizione
            if ($nuovoInizio <= $esistenteFine && $nuovaFine >= $esistenteInizio) {
                return false;
            }
        }

        FPersistentManager::store($intervallo);
        return true;
    }

    /**
     * Elimina un intervallo esistente
     */
    public static function eliminaIntervallo(EIntervallo $intervallo): void
    {
        FPersistentManager::delete($intervallo);
    }

    /**
     * Modifica un intervallo esistente (con verifica sovrapposizione)
     */
    public static function modificaIntervallo(EIntervallo $intervallo, \DateTime $nuovaDataI, \DateTime $nuovaDataF, float $nuovoPrezzo): bool
    {
        $struttura = $intervallo->getStruttura();

        foreach ($struttura->getIntervalli() as $esistente) {
            if ($esistente === $intervallo) {
                continue;
            }

            if ($nuovaDataI <= $esistente->getDataF() && $nuovaDataF >= $esistente->getDataI()) {
                return false; // sovrapposizione
            }
        }

        $intervallo->setDataI($nuovaDataI);
        $intervallo->setDataF($nuovaDataF);
        $intervallo->setPrezzo($nuovoPrezzo);

        FPersistentManager::store($intervallo);
        return true;
    }
}
