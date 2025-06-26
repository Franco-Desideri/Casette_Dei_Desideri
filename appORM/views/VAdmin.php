<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EUtente;
use App\models\EPrenotazione;

/**
 * Classe View per la gestione del pannello personale dell’amministratore.
 * Visualizza: profilo admin con tutte le prenotazioni, e dettaglio di una singola prenotazione.
 */
class VAdmin
{
    private Smarty $smarty;

    public function __construct()
    {
        // Avvio di Smarty tramite configurazione
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il profilo dell'amministratore e la lista completa delle prenotazioni ricevute
     *
     * @param EUtente $admin L'utente admin attualmente loggato
     * @param array $prenotazioni Elenco di tutte le prenotazioni registrate
     */
    public function mostraProfilo(EUtente $admin, array $prenotazioni): void
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('prenotazioni', $prenotazioni);
        $this->smarty->display('admin/profilo.tpl');
    }

    /**
     * Mostra i dettagli completi di una singola prenotazione
     *
     * @param EPrenotazione $prenotazione La prenotazione da esaminare
     */
    public function mostraDettagliPrenotazione(EPrenotazione $prenotazione): void
    {
        $this->smarty->assign('prenotazione', $prenotazione);
        $this->smarty->display('admin/prenotazione_dettagli.tpl');
    }
}