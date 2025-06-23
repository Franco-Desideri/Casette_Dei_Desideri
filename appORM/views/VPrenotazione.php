<?php

/**
 * Classe View per la gestione del processo di prenotazione
 * Visualizza: inserimento ospiti, riepilogo e pagamento
 */
class VPrenotazione
{
    private Smarty $smarty;

    public function __construct()
    {
        // Inizializzazione di Smarty
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il form per l'inserimento dei dati degli ospiti
     *
     * @param EStruttura $struttura La struttura selezionata per la prenotazione
     */
    public function mostraFormOspiti(EStruttura $struttura): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->display('prenotazione_ospiti.tpl');
    }

    /**
     * Mostra il riepilogo della prenotazione, inclusi ospiti, date e prezzo
     *
     * @param EStruttura $struttura La struttura prenotata
     * @param string $dataInizio Data di inizio soggiorno
     * @param string $dataFine Data di fine soggiorno
     * @param array $ospiti Dati degli ospiti inseriti
     * @param float $totale Prezzo totale del soggiorno
     */
    public function mostraRiepilogo(EStruttura $struttura, string $dataInizio, string $dataFine, array $ospiti, float $totale): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $dataInizio);
        $this->smarty->assign('dataFine', $dataFine);
        $this->smarty->assign('ospiti', $ospiti);
        $this->smarty->assign('totale', $totale);
        $this->smarty->display('prenotazione_riepilogo.tpl');
    }

    /**
     * Mostra il form per il pagamento con carta di credito
     */
    public function mostraPagamento(): void
    {
        $this->smarty->display('prenotazione_pagamento.tpl');
    }
}
