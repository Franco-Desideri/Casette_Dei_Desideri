<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EAttrazione;
use App\models\EEvento;

/**
 * Classe View per la gestione della visualizzazione dei contenuti da parte dell'amministratore
 */
class VAdminContenuti
{
    private Smarty $smarty;

    public function __construct()
    {
        // Inizializzazione del motore Smarty tramite la configurazione centralizzata
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il form per aggiungere o modificare un'attrazione
     *
     * @param EAttrazione|null $attrazione
     */
    public function mostraFormAttrazione(?EAttrazione $attrazione = null): void
    {
        $this->smarty->assign('attrazione', $attrazione);
        $this->smarty->display('admin/attrazione_form.tpl');
    }

    /**
     * Mostra il form per aggiungere o modificare un evento
     *
     * @param EEvento|null $evento
     */
    public function mostraFormEvento(?EEvento $evento = null): void
    {
        $this->smarty->assign('evento', $evento);
        $this->smarty->display('admin/evento_form.tpl');
    }

    /**
     * Mostra la dashboard amministratore con attrazioni ed eventi
     *
     * @param array $attrazioni
     * @param array $eventi
     */
    public function mostraHome(array $attrazioni, array $eventi): void
    {
        $this->smarty->assign('attrazioni', $attrazioni);
        $this->smarty->assign('eventi', $eventi);
        $this->smarty->display('admin/admin_home.tpl');
    }
}
