<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EPrenotazione;
use App\models\EStruttura;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Foundation per la gestione delle prenotazioni
 */
class FPrenotazione
{
    /**
     * Crea e salva una prenotazione se valida
     */
    public static function creaPrenotazione(EPrenotazione $prenotazione): bool
    {
        $struttura = $prenotazione->getStruttura();
        $dataInizio = $prenotazione->getPeriodo()->getDataI();
        $dataFine = $prenotazione->getPeriodo()->getDataF();

        if (!self::copreIntervalli($struttura->getIntervalli(), $dataInizio, $dataFine)) {
            return false;
        }

        if (self::conflittoConPrenotazioni($struttura, $dataInizio, $dataFine)) {
            return false;
        }

        $numOspiti = count($prenotazione->getOspitiDettagli());
        if ($numOspiti > $struttura->getNumOspiti()) {
            return false;
        }

        $prezzoTotale = self::calcolaPrezzoTotale($struttura->getIntervalli(), $dataInizio, $dataFine);
        $prenotazione->setPrezzo($prezzoTotale);

        FPersistentManager::store($prenotazione);
        return true;
    }

    /**
     * Verifica se gli intervalli coprono il periodo richiesto
     */
    private static function copreIntervalli(iterable $intervalli, \DateTime $dataInizio, \DateTime $dataFine): bool
    {
        $periodoRichiesto = new \DatePeriod(
            $dataInizio,
            new \DateInterval('P1D'),
            (clone $dataFine)->modify('+1 day')
        );

        $giorniCoperti = [];

        foreach ($intervalli as $intervallo) {
            $periodoIntervallo = new \DatePeriod(
                $intervallo->getDataI(),
                new \DateInterval('P1D'),
                (clone $intervallo->getDataF())->modify('+1 day')
            );
            foreach ($periodoIntervallo as $giorno) {
                $giorniCoperti[$giorno->format('Y-m-d')] = true;
            }
        }

        foreach ($periodoRichiesto as $giornoRichiesto) {
            if (!isset($giorniCoperti[$giornoRichiesto->format('Y-m-d')])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Verifica se c'è conflitto con prenotazioni esistenti
     */
    private static function conflittoConPrenotazioni(EStruttura $struttura, \DateTime $dataI, \DateTime $dataF): bool
    {
        foreach ($struttura->getPrenotazioni() as $p) {
            $pI = $p->getPeriodo()->getDataI();
            $pF = $p->getPeriodo()->getDataF();

            if (($dataI <= $pF) && ($dataF >= $pI)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Calcola il prezzo totale per il soggiorno richiesto
     */
    private static function calcolaPrezzoTotale(iterable $intervalli, \DateTime $dataInizio, \DateTime $dataFine): float
    {
        $prezzoTotale = 0.0;

        $giorniPrenotati = new \DatePeriod(
            $dataInizio,
            new \DateInterval('P1D'),
            (clone $dataFine)->modify('+1 day')
        );

        foreach ($giorniPrenotati as $giorno) {
            $prezzoGiornaliero = 0;

            foreach ($intervalli as $intervallo) {
                if ($giorno >= $intervallo->getDataI() && $giorno <= $intervallo->getDataF()) {
                    $prezzoGiornaliero = $intervallo->getPrezzo();
                    break;
                }
            }

            $prezzoTotale += $prezzoGiornaliero;
        }

        return $prezzoTotale;
    }

    /**
     * Restituisce le prenotazioni associate a un utente
     */
    public static function getPrenotazioniPerUtente(int $idUtente): array
    {
        return FPersistentManager::findBy(EPrenotazione::class, ['utente' => $idUtente]);
    }
}
