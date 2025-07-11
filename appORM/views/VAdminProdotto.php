<?php

// Namespace del livello view dell'applicazione
namespace App\views;

// Importazione delle classi necessarie
use Smarty\Smarty;                             // Motore di template Smarty
use App\install\StartSmarty;                  // Classe che configura e avvia Smarty
use App\models\EProdottoQuantita;            // Entità per prodotto a quantità
use App\models\EProdottoPeso;                // Entità per prodotto a peso

/**
 * Classe View per la gestione dei prodotti nella sezione admin.
 * Permette di visualizzare la lista dei prodotti e i form per aggiungerli o modificarli.
 */
class VAdminProdotto
{
    // Istanza di Smarty per la gestione dei template
    private Smarty $smarty;

    /**
     * Costruttore: inizializza Smarty usando la configurazione condivisa
     */
    public function __construct()
    {
        // Inizializzazione del motore di template
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra l'elenco dei prodotti disponibili, separati per visibilità e tipo (quantità o peso).
     * Aggiunge anche la codifica base64 delle immagini da passare al template.
     *
     * @param array $prodottiQ_visibili Elenco dei prodotti a quantità visibili
     * @param array $prodottiP_visibili Elenco dei prodotti a peso visibili
     * @param array $prodottiQ_nascosti Elenco dei prodotti a quantità nascosti
     * @param array $prodottiP_nascosti Elenco dei prodotti a peso nascosti
     */
    public function mostraLista(array $prodottiQ_visibili, array $prodottiP_visibili, array $prodottiQ_nascosti, array $prodottiP_nascosti): void
    {
        // Aggiunge l'immagine codificata ai prodotti a quantità visibili
        foreach ($prodottiQ_visibili as $prodotto) {
            $prodotto->fotoBase64 = $prodotto->getFotoBase64();
        }

        // Aggiunge l'immagine codificata ai prodotti a peso visibili
        foreach ($prodottiP_visibili as $prodotto) {
            $prodotto->fotoBase64 = $prodotto->getFotoBase64();
        }

        // Aggiunge l'immagine codificata ai prodotti a quantità nascosti
        foreach ($prodottiQ_nascosti as $prodotto) {
            $prodotto->fotoBase64 = $prodotto->getFotoBase64();
        }

        // Aggiunge l'immagine codificata ai prodotti a peso nascosti
        foreach ($prodottiP_nascosti as $prodotto) {
            $prodotto->fotoBase64 = $prodotto->getFotoBase64();
        }

        // Assegna le variabili al template Smarty
        $this->smarty->assign('prodottiQuantita_v', $prodottiQ_visibili);
        $this->smarty->assign('prodottiPeso_v', $prodottiP_visibili);
        $this->smarty->assign('prodottiQuantita_n', $prodottiQ_nascosti);
        $this->smarty->assign('prodottiPeso_n', $prodottiP_nascosti);

        // Mostra il template della lista prodotti
        $this->smarty->display('admin/prodotti_lista.tpl');
    }

    /**
     * Mostra il form per l'inserimento o la modifica di un prodotto.
     * Il form cambia a seconda che si tratti di un prodotto a quantità o a peso.
     *
     * @param EProdottoQuantita|EProdottoPeso|null $prodotto Prodotto da modificare, o null per creazione
     */
    public function mostraForm($prodotto): void
    {
        // Assegna il prodotto al template
        $this->smarty->assign('prodotto', $prodotto);

        // In base al tipo, mostra il form corrispondente
        if ($prodotto instanceof \App\models\EProdottoQuantita) {
            $this->smarty->display('admin/prodotto_form_quantita.tpl');
        } elseif ($prodotto instanceof \App\models\EProdottoPeso) {
            $this->smarty->display('admin/prodotto_form_peso.tpl');
        } else {
            // In caso di tipo non supportato
            echo "Tipo prodotto non supportato.";
        }
    }

    /**
     * Mostra il form vuoto per l'inserimento di un prodotto a quantità.
     */
    public function mostraFormQuantita(): void
    {
        // Nessun prodotto precompilato
        $this->smarty->assign('prodotto', null);
        $this->smarty->display('admin/prodotto_form_quantita.tpl');
    }

    /**
     * Mostra il form vuoto per l'inserimento di un prodotto a peso.
     */
    public function mostraFormPeso(): void
    {
        // Nessun prodotto precompilato
        $this->smarty->assign('prodotto', null);
        $this->smarty->display('admin/prodotto_form_peso.tpl');
    } 
}
