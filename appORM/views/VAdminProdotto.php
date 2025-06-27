<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EProdottoQuantita;
use App\models\EProdottoPeso;

/**
 * Classe View per la gestione dei prodotti nel listino (admin).
 * Visualizza: lista prodotti, form per aggiunta o modifica.
 */
class VAdminProdotto
{
    private Smarty $smarty;

    public function __construct()
    {
        // Inizializzazione Smarty
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra l'elenco di tutti i prodotti disponibili,
     * separati per tipo: quantità e peso.
     *
     * @param array $prodottiQ Elenco di EProdottoQuantita
     * @param array $prodottiP Elenco di EProdottoPeso
     */
    public function mostraLista(array $prodottiQ, array $prodottiP): void
    {
        $this->smarty->assign('prodottiQuantita', $prodottiQ);
        $this->smarty->assign('prodottiPeso', $prodottiP);
        $this->smarty->display('admin/prodotti_lista.tpl');
    }

    /**
     * Mostra il form per aggiungere un nuovo prodotto o modificarne uno esistente.
     * Se $prodotto è null → form vuoto (aggiunta).
     * Altrimenti → form con valori precompilati (modifica).
     *
     * @param EProdottoQuantita|EProdottoPeso|null $prodotto
     */
    public function mostraForm($prodotto): void
    {
        $this->smarty->assign('prodotto', $prodotto);

        if ($prodotto instanceof \App\models\EProdottoQuantita) {
            $this->smarty->display('admin/prodotto_form_quantita.tpl');
        } elseif ($prodotto instanceof \App\models\EProdottoPeso) {
            $this->smarty->display('admin/prodotto_form_peso.tpl');
        } else {
            echo "Tipo prodotto non supportato.";
        }
    }

    public function mostraFormQuantita(): void
    {
        $this->smarty->assign('prodotto', null);
        $this->smarty->display('admin/prodotto_form_quantita.tpl');
    }

    public function mostraFormPeso(): void
    {
        $this->smarty->assign('prodotto', null);
        $this->smarty->display('admin/prodotto_form_peso.tpl');
    } 
}
