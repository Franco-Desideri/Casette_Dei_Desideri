<?php

class FPrenotazione
{
    public static function creaPrenotazione(EPrenotazione $prenotazione): bool
    {
        $struttura = $prenotazione->getStruttura();
        $dataInizio = $prenotazione->getPeriodo()->getDataI();
        $dataFine = $prenotazione->getPeriodo()->getDataF();

        // Verifica disponibilità in intervalli
        if (!self::copreIntervalli($struttura->getIntervalli(), $dataInizio, $dataFine)) {
            return false;
        }

        // Verifica che non ci siano altre prenotazioni in quelle date
        if (self::conflittoConPrenotazioni($struttura, $dataInizio, $dataFine)) {
            return false;
        }

        // Verifica che il numero di ospiti non superi la capacità
        $numOspiti = count($prenotazione->getOspitiDettagli());
        $capacitaStruttura = $struttura->getNumOspiti();

        if ($numOspiti > $capacitaStruttura) {
            return false;
        }

        // Salva tutto (Doctrine salva anche gli ospiti)
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

    public static function getPrenotazioniPerUtente(int $idUtente): array
    {
        return FPersistentManager::findBy(EPrenotazione::class, ['utente' => $idUtente]);
    }
}
