<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EIntervallo;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Foundation per la gestione degli intervalli di disponibilità e prezzo
 * associati alle strutture.
 */
class FIntervallo
{
    /**
     * Verifica se un singolo intervallo è valido in termini di date e prezzo.
     *
     * @param EIntervallo $intervallo L'intervallo da validare.
     * @return bool|string True se valido, stringa di errore se non valido.
     */
    public static function validaSingoloIntervallo(EIntervallo $intervallo): bool|string
    {
        $inizio = $intervallo->getDataI();
        $fine = $intervallo->getDataF();
        $prezzo = $intervallo->getPrezzo();

        if ($inizio >= $fine) {
            return "La data di inizio deve essere precedente a quella di fine.";
        }

        if (!is_numeric($prezzo) || $prezzo <= 0) {
            return "Il prezzo deve essere un numero positivo.";
        }

        return true;
    }

    /**
     * Verifica se ci sono sovrapposizioni all'interno di un array di intervalli.
     *
     * @param EIntervallo[] $intervalli Array di intervalli da analizzare.
     * @return bool|string True se nessuna sovrapposizione, stringa di errore se presente.
     */
    public static function verificaSovrapposizioni(array $intervalli): bool|string
    {
        usort($intervalli, fn($a, $b) => $a->getDataI() <=> $b->getDataI());

        for ($i = 0; $i < count($intervalli) - 1; $i++) {
            $a = $intervalli[$i];
            $b = $intervalli[$i + 1];

            if ($a->getDataF() > $b->getDataI()) {
                return "Sovrapposizione tra intervalli " .
                    $a->getDataI()->format('Y-m-d') . " - " . $a->getDataF()->format('Y-m-d') . " e " .
                    $b->getDataI()->format('Y-m-d') . " - " . $b->getDataF()->format('Y-m-d');
            }
        }

        return true;
    }

    /**
     * Verifica se un intervallo si sovrappone ad altri intervalli già presenti nella struttura.
     *
     * @param EIntervallo $intervallo L'intervallo da controllare.
     * @return bool True se sovrapposto, false altrimenti.
     */
    public static function intervalloSovrapposto(EIntervallo $intervallo): bool
    {
        $struttura = $intervallo->getStruttura();
        if (!$struttura) return false;

        $nuovoInizio = $intervallo->getDataI();
        $nuovaFine = $intervallo->getDataF();

        foreach ($struttura->getIntervalli() as $esistente) {
            if ($esistente === $intervallo) {
                continue;
            }
            if ($nuovoInizio <= $esistente->getDataF() && $nuovaFine >= $esistente->getDataI()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Crea un nuovo intervallo, se valido e non sovrapposto ad altri.
     *
     * @param EIntervallo $intervallo L'intervallo da creare.
     * @return bool|string True se creato correttamente, stringa di errore altrimenti.
     */
    public static function creaIntervallo(EIntervallo $intervallo): bool|string
    {
        $valido = self::validaSingoloIntervallo($intervallo);
        if ($valido !== true) return $valido;

        if (self::intervalloSovrapposto($intervallo)) {
            return "L'intervallo si sovrappone ad un altro esistente.";
        }

        FPersistentManager::store($intervallo);
        return true;
    }

    /**
     * Elimina un intervallo esistente.
     *
     * @param EIntervallo $intervallo L'intervallo da eliminare.
     * @return void
     */
    public static function eliminaIntervallo(EIntervallo $intervallo): void
    {
        FPersistentManager::delete($intervallo);
    }

    /**
     * Modifica un intervallo esistente con nuove date/prezzo, se valido e non in conflitto.
     *
     * @param EIntervallo $intervallo L'intervallo da modificare.
     * @param \DateTime $nuovaDataI Nuova data di inizio.
     * @param \DateTime $nuovaDataF Nuova data di fine.
     * @param float $nuovoPrezzo Nuovo prezzo giornaliero.
     * @return bool|string True se modificato, stringa di errore se non valido.
     */
    public static function modificaIntervallo(EIntervallo $intervallo, \DateTime $nuovaDataI, \DateTime $nuovaDataF, float $nuovoPrezzo): bool|string
    {
        $intervallo->setDataI($nuovaDataI);
        $intervallo->setDataF($nuovaDataF);
        $intervallo->setPrezzo($nuovoPrezzo);

        $valido = self::validaSingoloIntervallo($intervallo);
        if ($valido !== true) return $valido;

        if (self::intervalloSovrapposto($intervallo)) {
            return "Modifica non valida: sovrapposizione con altro intervallo.";
        }

        FPersistentManager::store($intervallo);
        return true;
    }
}
