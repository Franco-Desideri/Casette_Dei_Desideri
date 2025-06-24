<?php

namespace App\services\TechnicalServiceLayer\foundation;

class FPrenotazione
{
    public static function creaPrenotazione(EPrenotazione $prenotazione): bool
    {
        $struttura = $prenotazione->getStruttura();
        $dataInizio = $prenotazione->getPeriodo()->getDataI();
        $dataFine = $prenotazione->getPeriodo()->getDataF();

        // Verifica copertura da intervalli
        if (!self::copreIntervalli($struttura->getIntervalli(), $dataInizio, $dataFine)) {
            return false;
        }

        // Verifica sovrapposizioni con altre prenotazioni
        if (self::conflittoConPrenotazioni($struttura, $dataInizio, $dataFine)) {
            return false;
        }

        // Verifica numero massimo ospiti
        $numOspiti = count($prenotazione->getOspitiDettagli());
        if ($numOspiti > $struttura->getNumOspiti()) {
            return false;
        }

        // Calcolo del prezzo totale in base ai giorni/intervalli
        $prezzoTotale = self::calcolaPrezzoTotale($struttura->getIntervalli(), $dataInizio, $dataFine);
        $prenotazione->setPrezzo($prezzoTotale);

        // Salva la prenotazione
        FPersistentManager::store($prenotazione);
        return true;
    }

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

    public static function getPrenotazioniPerUtente(int $idUtente): array
    {
        return FPersistentManager::findBy(EPrenotazione::class, ['utente' => $idUtente]);
    }
}
