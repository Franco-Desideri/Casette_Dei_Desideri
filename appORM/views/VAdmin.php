<?php

// Namespace del livello di presentazione (view)
namespace App\views;

// Importazione delle classi necessarie
use Smarty\Smarty;                         // Motore di template Smarty
use App\install\StartSmarty;              // Classe di inizializzazione di Smarty
use App\models\EUtente;                   // Entità utente (modello)
use App\models\EPrenotazione;            // Entità prenotazione (modello)

/**
 * Classe View per la gestione del pannello personale dell’amministratore.
 * Visualizza: profilo admin con tutte le prenotazioni, e dettaglio di una singola prenotazione.
 */
class VAdmin
{
    // Istanza del motore Smarty
    private Smarty $smarty;

    /**
     * Costruttore: inizializza Smarty tramite la classe StartSmarty
     */
    public function __construct()
    {
        // Avvio di Smarty tramite configurazione personalizzata
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il profilo dell'amministratore e la lista completa delle prenotazioni ricevute
     *
     * @param EUtente $admin L'utente admin attualmente loggato
     * @param array $prenotazioni Elenco di tutte le prenotazioni registrate (array di EPrenotazione)
     */
    public function mostraProfilo(EUtente $admin, array $prenotazioni): void
    {
        // Assegna l'oggetto utente al template
        $this->smarty->assign('admin', $admin);

        // Assegna la lista delle prenotazioni al template
        $this->smarty->assign('prenotazioni', $prenotazioni);

        // Mostra il template profilo dell'amministratore
        $this->smarty->display('admin/profilo.tpl');
    }

    /**
     * Mostra i dettagli di una singola prenotazione
     *
     * @param mixed $prenotazione Oggetto della prenotazione selezionata (non utilizzato direttamente nel template)
     * @param mixed $struttura Nome o oggetto della struttura prenotata
     * @param mixed $periodo Oggetto che contiene data di inizio e fine (es. PeriodoPrenotazione)
     * @param mixed $ospiti Numero o lista di ospiti
     * @param mixed $totale Totale della prenotazione
     * @param string $ruolo Ruolo dell'utente (es. 'admin' o 'utente') per personalizzare la vista
     */
    public function mostraRiepilogoPrenotazione($prenotazione, $struttura, $periodo, $ospiti, $totale, $ruolo): void
    {
        // Assegna il ruolo dell'utente (es. admin) al template
        $this->smarty->assign('ruolo', $ruolo);

        // Assegna il nome o oggetto della struttura prenotata
        $this->smarty->assign('struttura', $struttura);

        // Assegna la data di inizio formattata in formato gg/mm/aaaa
        $this->smarty->assign('dataInizio', $periodo->getDataI()->format('d/m/Y'));

        // Assegna la data di fine formattata
        $this->smarty->assign('dataFine', $periodo->getDataF()->format('d/m/Y'));

        // Assegna il numero o la lista degli ospiti
        $this->smarty->assign('ospiti', $ospiti);

        // Assegna il totale della prenotazione
        $this->smarty->assign('totale', $totale);

        // Mostra il template del riepilogo prenotazione
        $this->smarty->display('utente/prenotazione_riepilogo.tpl');
    }
}
