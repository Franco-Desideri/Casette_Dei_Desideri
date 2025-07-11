<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;

/**
 * View dedicata alla gestione della spesa a domicilio lato utente.
 * Si occupa della visualizzazione:
 * - del listino prodotti (quantità e peso),
 * - del riepilogo d’ordine prima dell’invio,
 * - della conferma ordine completato.
 */
class VOrdine
{
    /**
     * Motore di template Smarty.
     *
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * Costruttore: inizializza Smarty tramite configurazione centralizzata.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il listino prodotti divisi per tipologia (quantità e peso).
     * Per ciascun prodotto viene generata la versione base64 della foto per l’anteprima.
     *
     * @param array $prodottiQ Array di oggetti EProdottoQuantita
     * @param array $prodottiP Array di oggetti EProdottoPeso
     */
    public function mostraListino(array $prodottiQ, array $prodottiP): void
    {
        // Aggiunta immagine base64 ai prodotti a quantità
        foreach ($prodottiQ as $prodotto) {
            $prodotto->fotoBase64 = $prodotto->getFotoBase64();
        }

        // Aggiunta immagine base64 ai prodotti a peso
        foreach ($prodottiP as $prodotto) {
            $prodotto->fotoBase64 = $prodotto->getFotoBase64();
        }

        $this->smarty->assign('prodottiQuantita', $prodottiQ);
        $this->smarty->assign('prodottiPeso', $prodottiP);
        $this->smarty->display('utente/listino_prodotti.tpl');
    }

    /**
     * Mostra il riepilogo dell'ordine prima dell’invio.
     * Se presente, mostra anche un eventuale messaggio di errore sui contanti.
     *
     * @param array $ordineData Dati dell’ordine (es. prodotti selezionati, orario, totale)
     * @param string|null $errore Messaggio di errore sui contanti (opzionale)
     */
    public function mostraRiepilogo(array $ordineData, ?string $errore = null): void
    {
        $this->smarty->assign('ordine', $ordineData);

        if ($errore !== null) {
            $this->smarty->assign('errore_contanti', $errore);
        }

        $this->smarty->display('utente/riepilogo.tpl');
    }

    /**
     * Mostra il messaggio di conferma dopo l’invio dell’ordine.
     */
    public function confermaOrdine(): void
    {
        $this->smarty->display('libs/Smarty/templates/utente/conferma_ordine.tpl');
    }
}
