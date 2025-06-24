<?php

namespace App\views;
use Smarty\Smarty;
use App\install\StartSmarty;


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
     * Mostra il form di login (senza errori)
     */
    public function mostraLogin(): void
    {
        $this->smarty->display('utente/login.tpl');
    }

    /**
     * Mostra il form di login con un messaggio di errore
     *
     * @param string $errore Messaggio di errore da mostrare all'utente
     */
    public function mostraLoginConErrore(string $errore): void
    {
        $this->smarty->assign('errore', $errore);
        $this->smarty->display('utente/login.tpl');
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
     * Mostra i dettagli di una specifica prenotazione dell'utente
     *
     * @param EPrenotazione $prenotazione La prenotazione selezionata
     */
    public function mostraPrenotazione(EPrenotazione $prenotazione): void
    {
        $this->smarty->assign('prenotazione', $prenotazione);
        $this->smarty->display('utente/prenotazione.tpl');
    }

    /**
     * Mostra la home page dell'utente con eventi e attrazioni
     *
     * @param array $eventi     Lista di oggetti EEvento
     * @param array $attrazioni Lista di oggetti EAttrazione
     */
    public function mostraHome(array $eventi, array $attrazioni): void
    {
        $this->smarty->assign('eventi', $eventi);
        $this->smarty->assign('attrazioni', $attrazioni);
        $this->smarty->display('utente/home.tpl');
    }

    /**
     * Mostra il form di registrazione
     */
    public function mostraRegistrazione(): void
    {
        $this->smarty->display('utente/registrazione.tpl');
    }

    /**
     * Mostra il form di registrazione con errore
     */
    public function mostraRegistrazioneConErrore(string $errore): void
    {
        $this->smarty->assign('errore', $errore);
        $this->smarty->display('utente/registrazione.tpl');
    }
}
