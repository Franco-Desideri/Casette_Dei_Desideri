<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EUtente;
use App\models\EPrenotazione;
use App\models\EEvento;
use App\models\EAttrazione;

/**
 * Classe View per la gestione della visualizzazione dell'utente
 * Responsabile di: login, profilo utente e visualizzazione prenotazioni personali
 */
class VUser
{
    private Smarty $smarty;

    public function __construct()
    {
        // Inizializzazione del motore Smarty tramite la configurazione centralizzata
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il form di login e registrazione
     */
    public function mostraAutenticazione(string $erroreLogin = null, string $erroreReg = null): void
    {
        $this->smarty->assign("erroreLogin", $erroreLogin);
        $this->smarty->assign("erroreReg", $erroreReg);
        $this->smarty->display("utente/login.tpl");
    }


    /**
     * Mostra la pagina del profilo dell'utente con lo storico delle prenotazioni
     *
     * @param EUtente $utente L'oggetto utente attualmente loggato
     */
    public function mostraProfilo(EUtente $utente): void
    {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('prenotazioni', $utente->getPrenotazioni());
        $this->smarty->display('utente/profilo.tpl');
    }

    /**
     * Mostra la home page dell'utente con eventi e attrazioni
     *
     * @param array $eventi     Lista di oggetti EEvento
     * @param array $attrazioni Lista di oggetti EAttrazione
     */
    public function mostraHome(array $eventi, array $attrazioni): void
    {
        foreach ($eventi as $e) {
            if ($e->getImmagine()) {
                $e->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($e->getImmagine()));
            }
        }
        
        foreach ($attrazioni as $a) {
            if ($a->getImmagine()) {
                $a->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($a->getImmagine()));
            }
        }
        $this->smarty->assign('attrazioni', $attrazioni);
        $this->smarty->assign('eventi', $eventi);
        $this->smarty->display('utente/home.tpl');
    }

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
