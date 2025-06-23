<?php

/**
 * Classe View per la gestione della visualizzazione dei contenuti da parte dell'amministratore
 * Responsabile di: attrazioni ed eventi (lista, form di creazione/modifica)
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
     * Mostra la lista delle attrazioni presenti
     *
     * @param array $attrazioni Array di oggetti EAttrazione
     */
    public function mostraListaAttrazioni(array $attrazioni): void
    {
        $this->smarty->assign('attrazioni', $attrazioni);
        $this->smarty->display('admin/attrazioni_lista.tpl');
    }

    /**
     * Mostra il form per aggiungere o modificare un'attrazione
     *
     * @param EAttrazione|null $attrazione Oggetto esistente da modificare, oppure null per nuova
     */
    public function mostraFormAttrazione(?EAttrazione $attrazione = null): void
    {
        $this->smarty->assign('attrazione', $attrazione);
        $this->smarty->display('admin/attrazione_form.tpl');
    }

    /**
     * Mostra la lista degli eventi presenti
     *
     * @param array $eventi Array di oggetti EEvento
     */
    public function mostraListaEventi(array $eventi): void
    {
        $this->smarty->assign('eventi', $eventi);
        $this->smarty->display('admin/eventi_lista.tpl');
    }

    /**
     * Mostra il form per aggiungere o modificare un evento
     *
     * @param EEvento|null $evento Oggetto esistente da modificare, oppure null per nuovo
     */
    public function mostraFormEvento(?EEvento $evento = null): void
    {
        $this->smarty->assign('evento', $evento);
        $this->smarty->display('admin/evento_form.tpl');
    }
}
