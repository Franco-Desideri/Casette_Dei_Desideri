<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EPrenotazione;
use App\models\EStruttura;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Foundation per la gestione delle prenotazioni.
 *
 * Contiene logiche di dominio relative alla creazione e validazione di prenotazioni,
 * come il controllo della disponibilità e il calcolo del prezzo totale.
 */
class FPrenotazione
{
    /**
     * Salva una nuova prenotazione nel database.
     * 
     * @param EPrenotazione $prenotazione Oggetto prenotazione da salvare
     * @return bool true se la prenotazione è stata memorizzata correttamente
     */
    public static function creaPrenotazione(EPrenotazione $prenotazione): bool
    {
        FPersistentManager::store($prenotazione);
        return true;
    }

    /**
     * Verifica che il periodo richiesto sia interamente coperto da intervalli prenotabili.
     * 
     * Ogni giorno tra `dataInizio` e `dataFine` deve rientrare almeno in un intervallo valido.
     * 
     * @param iterable $intervalli Intervalli disponibili della struttura
     * @param \DateTime $dataInizio Data inizio richiesta
     * @param \DateTime $dataFine Data fine richiesta
     * @return bool true se tutte le date richieste sono coperte
     */
    public static function copreIntervalli(iterable $intervalli, \DateTime $dataInizio, \DateTime $dataFine): bool
    {
        $periodoRichiesto = new \DatePeriod(
            $dataInizio,
            new \DateInterval('P1D'),
            (clone $dataFine)->modify('+1 day') // include anche il giorno di fine
        );

        $giorniCoperti = [];

        // Costruisce una mappa dei giorni prenotabili
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

        // Verifica che ogni giorno richiesto sia coperto
        foreach ($periodoRichiesto as $giornoRichiesto) {
            if (!isset($giorniCoperti[$giornoRichiesto->format('Y-m-d')])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Verifica se il periodo richiesto si sovrappone con prenotazioni esistenti.
     * 
     * Due intervalli si sovrappongono se: start1 <= end2 && end1 >= start2
     *
     * @param EStruttura $struttura Struttura da controllare
     * @param \DateTime $dataI Inizio del nuovo periodo richiesto
     * @param \DateTime $dataF Fine del nuovo periodo richiesto
     * @return bool true se esiste un conflitto
     */
    public static function conflittoConPrenotazioni(EStruttura $struttura, \DateTime $dataI, \DateTime $dataF): bool
    {
        foreach ($struttura->getPrenotazioni() as $p) {
            $pI = $p->getPeriodo()->getDataI();
            $pF = $p->getPeriodo()->getDataF();

            if (($dataI <= $pF) && ($dataF >= $pI)) {
                return true; // C'è una sovrapposizione
            }
        }

        return false;
    }

    /**
     * Calcola il prezzo totale della prenotazione sommando i prezzi giornalieri.
     * 
     * Per ogni giorno richiesto, cerca a quale intervallo corrisponde e ne somma il prezzo.
     *
     * @param iterable $intervalli Intervalli della struttura (con prezzo)
     * @param \DateTime $dataInizio Data di inizio soggiorno
     * @param \DateTime $dataFine Data di fine soggiorno
     * @return float Prezzo totale per il soggiorno
     */
    public static function calcolaPrezzoTotale(iterable $intervalli, \DateTime $dataInizio, \DateTime $dataFine): float
    {
        $prezzoTotale = 0.0;

        $giorniPrenotati = new \DatePeriod(
            $dataInizio,
            new \DateInterval('P1D'),
            (clone $dataFine)->modify('+1 day')
        );

        foreach ($giorniPrenotati as $giorno) {
            foreach ($intervalli as $intervallo) {
                if ($giorno >= $intervallo->getDataI() && $giorno <= $intervallo->getDataF()) {
                    $prezzoTotale += $intervallo->getPrezzo();
                    break;
                }
            }
        }

        return $prezzoTotale;
    }
}
