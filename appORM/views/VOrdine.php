<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;

/**
 * Classe View per la gestione dell'ordine della spesa a domicilio.
 * Visualizza: listino prodotti, riepilogo ordine e conferma invio.
 */
class VOrdine
{
    private Smarty $smarty;

    public function __construct()
    {
        // Inizializzazione del motore Smarty
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il listino dei prodotti disponibili per l'ordine,
     * separati per tipo: prodotti a quantità e a peso.
     *
     * @param array $prodottiQ Elenco di EProdottoQuantita
     * @param array $prodottiP Elenco di EProdottoPeso
     */
    public function mostraListino(array $prodottiQ, array $prodottiP): void
    {
        $this->smarty->assign('prodottiQuantita', $prodottiQ);
        $this->smarty->assign('prodottiPeso', $prodottiP);
        $this->smarty->display('utente/ordine_lista.tpl');
    }

    /**
     * Mostra il riepilogo dell'ordine: prodotti scelti, quantità e orario
     *
     * @param array $ordineData Dati dell'ordine temporaneo salvati in sessione
     */
    public function mostraRiepilogo(array $ordineData): void
    {
        $this->smarty->assign('ordine', $ordineData);
        $this->smarty->display('utente/ordine_riepilogo.tpl');
    }

    /**
     * Mostra un messaggio di conferma ordine inviato
     */
    public function confermaOrdine(): void
    {
        echo "<script>
            alert('Ordine inviato! Riceverai conferma via email in base alla disponibilità della struttura.');
            window.location.href='/Casette_Dei_Desideri/Struttura/lista';
        </script>";
    }
}
