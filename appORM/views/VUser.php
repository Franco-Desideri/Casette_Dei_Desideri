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
 * Si occupa della presentazione lato frontend per:
 * - Login e registrazione
 * - Profilo utente
 * - Home con eventi e attrazioni
 * - Riepilogo prenotazione
 */
class VUser
{
    /**
     * Istanza di Smarty per il rendering delle viste.
     *
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * Costruttore: inizializza il motore Smarty tramite configurazione centralizzata.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra la pagina di login e registrazione.
     *
     * @param string|null $erroreLogin Messaggio di errore per il login, se presente.
     * @param string|null $erroreReg   Messaggio di errore per la registrazione, se presente.
     * @return void
     */
    public function mostraAutenticazione(string $erroreLogin = null, string $erroreReg = null): void
    {
        $this->smarty->assign("erroreLogin", $erroreLogin);
        $this->smarty->assign("erroreReg", $erroreReg);
        $this->smarty->display("utente/login.tpl");
    }

    /**
     * Mostra la pagina del profilo utente, inclusa la lista prenotazioni.
     *
     * @param EUtente $utente Oggetto utente attualmente loggato.
     * @return void
     */
    public function mostraProfilo(EUtente $utente): void
    {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('prenotazioni', $utente->getPrenotazioni());
        $this->smarty->display('utente/profilo.tpl');
    }

    /**
     * Mostra la home page utente con eventi e attrazioni.
     * Converte eventuali immagini binarie in base64 per visualizzazione immediata.
     *
     * @param EEvento[]     $eventi     Lista di eventi.
     * @param EAttrazione[] $attrazioni Lista di attrazioni.
     * @return void
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

    /**
     * Mostra il riepilogo di una prenotazione (dettagli struttura, ospiti, periodo, totale).
     *
     * @param EPrenotazione $prenotazione Oggetto prenotazione.
     * @param mixed         $struttura    Struttura associata alla prenotazione.
     * @param mixed         $periodo      Periodo della prenotazione (con metodi getDataI e getDataF).
     * @param array         $ospiti       Lista associativa con dati ospiti.
     * @param float         $totale       Totale prenotazione.
     * @param string        $ruolo        Ruolo utente (es. admin o utente).
     * @return void
     */
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
