<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;

/**
 * Classe View per la gestione delle strutture da parte dell’amministratore.
 * Visualizza: lista strutture, form per creazione/modifica struttura.
 */
class VAdminStruttura
{
    private Smarty $smarty;

    public function __construct()
    {
        // Avvia il motore Smarty
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra l'elenco completo delle strutture gestite dall’amministratore
     *
     * @param array $strutture Elenco di oggetti EStruttura
     */
    public function mostraLista(array $strutture): void
    {
        $this->smarty->assign('strutture', $strutture);
        $this->smarty->display('admin/strutture_lista.tpl');
    }

    /**
     * Mostra il form per aggiungere o modificare una struttura.
     * Se $struttura è null → è un nuovo inserimento.
     *
     * @param EStruttura|null $struttura La struttura da modificare (o null per nuova)
     */
    public function mostraForm(?EStruttura $struttura = null): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->display('admin/struttura_form.tpl');
    }
}
