<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;

/**
 * Classe View per la gestione delle strutture da parte dell’amministratore.
 * Responsabile della visualizzazione:
 * - dell’elenco delle strutture gestite,
 * - del form di creazione o modifica struttura.
 */
class VAdminStruttura
{
    /**
     * Istanza del motore di template Smarty.
     *
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * Costruttore: inizializza il motore Smarty tramite configurazione centralizzata.
     */
    public function __construct()
    {
        // Avvio Smarty tramite configurazione predefinita
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra la lista completa delle strutture gestite dall'amministratore.
     * Per ciascuna struttura, viene generata l'immagine principale in base64.
     *
     * @param array $strutture Elenco di istanze di EStruttura
     */
    public function mostraLista(array $strutture): void
    {
        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $this->smarty->assign('strutture', $strutture);
        $this->smarty->display('admin/lista_strutture.tpl');
    }

    /**
     * Mostra il form per l'inserimento o modifica di una struttura.
     * Se viene fornito un oggetto struttura, si assume la modifica.
     * Altrimenti, si tratta di una nuova creazione.
     *
     * @param EStruttura|null $struttura Oggetto struttura da modificare, oppure null per nuova
     */
    public function mostraForm(?EStruttura $struttura = null): void
    {
        // Se si tratta di modifica, carichiamo le immagini già esistenti in base64
        if ($struttura) {
            foreach ($struttura->getFoto() as $f) {
                if ($f->getImmagine()) {
                    $f->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($f->getImmagine()));
                }
            }
        }

        $this->smarty->assign('struttura', $struttura);
        $this->smarty->display('admin/aggiungi_struttura.tpl');
    }
}
