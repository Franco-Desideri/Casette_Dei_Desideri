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

        foreach ($prodottiQ as $prodotto) {
        $prodotto->fotoBase64 = $prodotto->getFotoBase64();
    }

    // Aggiungiamo fotoBase64 ai prodotti a peso
    foreach ($prodottiP as $prodotto) {
        $prodotto->fotoBase64 = $prodotto->getFotoBase64();
    }
        $this->smarty->assign('prodottiQuantita', $prodottiQ);
        $this->smarty->assign('prodottiPeso', $prodottiP);
        $this->smarty->display('utente/listino_prodotti.tpl');
    }

    /**
     * Mostra il riepilogo dell'ordine: prodotti scelti, quantità e orario
     *
     * @param array $ordineData Dati dell'ordine temporaneo salvati in sessione
     */
    public function mostraRiepilogo(array $ordineData, ?string $errore = null): void
{
    $this->smarty->assign('ordine', $ordineData);

    // Controlla se esiste un messaggio di errore
     if ($errore !== null) {
        $this->smarty->assign('errore_contanti', $errore);
    }

    $this->smarty->display('utente/riepilogo.tpl');
}
    /**
     * Mostra un messaggio di conferma ordine inviato
     */
    public function confermaOrdine(): void
    {
        $this->smarty->display('libs/Smarty/templates/utente/conferma_ordine.tpl');
    }
}
