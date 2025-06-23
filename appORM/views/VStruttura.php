<?php

/**
 * Classe View per la visualizzazione delle strutture lato utente.
 * Si occupa di mostrare la lista delle strutture e i dettagli di una singola struttura.
 */
class VStruttura
{
    private Smarty $smarty;

    public function __construct()
    {
        // Avvia il motore Smarty tramite configurazione centralizzata
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra l'elenco di tutte le strutture disponibili
     *
     * @param array $strutture Array di oggetti EStruttura
     */
    public function mostraLista(array $strutture): void
    {
        $this->smarty->assign('strutture', $strutture);
        $this->smarty->display('utente/struttura_lista.tpl');
    }

    /**
     * Mostra i dettagli di una singola struttura, inclusi:
     * - informazioni testuali
     * - foto
     * - intervalli di disponibilità
     * - date già prenotate
     *
     * @param EStruttura $struttura L'oggetto struttura selezionato
     * @param Collection $prenotazioni Elenco delle prenotazioni effettuate sulla struttura
     * @param Collection $intervalli Elenco degli intervalli di disponibilità della struttura
     */
    public function mostraDettaglio(EStruttura $struttura, Collection $prenotazioni, Collection $intervalli): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('prenotazioni', $prenotazioni);
        $this->smarty->assign('intervalli', $intervalli);
        $this->smarty->display('utente/struttura_dettaglio.tpl');
    }
}
