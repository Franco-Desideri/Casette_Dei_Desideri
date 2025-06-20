<?php

class FPrenotazione
{
    /**
     * Crea una prenotazione dopo aver verificato disponibilità
     */
    public static function creaPrenotazione(EPrenotazione $prenotazione): bool
    {
        $struttura = $prenotazione->getStruttura();
        $dataInizio = $prenotazione->getPeriodo()->getDataI();
        $dataFine = $prenotazione->getPeriodo()->getDataF();

        // Verifica disponibilità intervalli
        if (!self::copreIntervalli($struttura->getIntervalli(), $dataInizio, $dataFine)) {
            return false;
        }

        // Verifica assenza di sovrapposizioni con altre prenotazioni
        if (self::conflittoConPrenotazioni($struttura, $dataInizio, $dataFine)) {
            return false;
        }

        // Se tutto valido, salva
        FPersistentManager::store($prenotazione);
        return true;
    }

    /**
     * Controlla che l'intervallo richiesto sia coperto da uno o più intervalli
     */
    private static function copreIntervalli(iterable $intervalli, \DateTime $dataInizio, \DateTime $dataFine): bool
    {
        $periodoRichiesto = new \DatePeriod(
            $dataInizio,
            new \DateInterval('P1D'),
            (clone $dataFine)->modify('+1 day') // inclusivo
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
     * Controlla se ci sono prenotazioni esistenti che si sovrappongono
     */
    private static function conflittoConPrenotazioni(EStruttura $struttura, \DateTime $dataI, \DateTime $dataF): bool
    {
        foreach ($struttura->getPrenotazioni() as $p) {
            $pI = $p->getPeriodo()->getDataI();
            $pF = $p->getPeriodo()->getDataF();

            if (
                ($dataI <= $pF) && ($dataF >= $pI) // intervallo sovrapposto
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Recupera tutte le prenotazioni di un dato utente
     */
    public static function getPrenotazioniPerUtente(int $idUtente): array
    {
        return FPersistentManager::findBy(EPrenotazione::class, ['utente' => $idUtente]);
    }
}
