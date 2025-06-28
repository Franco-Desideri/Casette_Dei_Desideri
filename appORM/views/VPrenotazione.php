<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;

class VPrenotazione
{
    private Smarty $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il riepilogo iniziale con dati base
     */
    public function mostraRiepilogoParziale(EStruttura $struttura, string $dataInizio, string $dataFine, int $numOspiti, float $totale): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $dataInizio);
        $this->smarty->assign('dataFine', $dataFine);
        $this->smarty->assign('numOspiti', $numOspiti);
        $this->smarty->assign('totale', $totale);
        $this->smarty->display('utente/prenotazione_riepilogo_parziale.tpl');
    }

    /**
     * Mostra il form per l’inserimento degli ospiti (dopo riepilogo parziale)
     */
    public function mostraFormOspiti(EStruttura $struttura): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->display('utente/prenotazione_ospiti.tpl');
    }

    /**
     * Mostra il riepilogo completo con ospiti e prezzo totale
     */
    public function mostraRiepilogoCompleto(EStruttura $struttura, string $dataInizio, string $dataFine, array $ospiti, float $totale): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $dataInizio);
        $this->smarty->assign('dataFine', $dataFine);
        $this->smarty->assign('ospiti', $ospiti);
        $this->smarty->assign('totale', $totale);
        $this->smarty->display('utente/prenotazione_riepilogo.tpl');
    }

    /**
     * Mostra la schermata di pagamento
     */
    public function mostraPagamento(): void
    {
        $this->smarty->display('utente/prenotazione_pagamento.tpl');
    }
}
