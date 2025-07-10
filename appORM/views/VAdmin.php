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

    /*Mostra i dettagli di una singola prenotazione*/

    public function mostraRiepilogoPrenotazione($prenotazione, $struttura, $periodo, $ospiti, $totale, $ruolo): void
    {
        $this->smarty->assign('ruolo', $ruolo);
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $periodo->getDataI()->format('d/m/Y'));
        $this->smarty->assign('dataFine', $periodo->getDataF()->format('d/m/Y'));
        $this->smarty->assign('ospiti', $ospiti);
        $this->smarty->assign('totale', $totale);

        $this->smarty->display('utente/prenotazione_riepilogo.tpl');
    }
}