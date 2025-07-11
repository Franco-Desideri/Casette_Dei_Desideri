<?php

// Namespace del livello di presentazione (view)
namespace App\views;

// Importazione delle classi necessarie
use Smarty\Smarty;                         // Motore di template Smarty
use App\install\StartSmarty;              // Classe per l'avvio e configurazione di Smarty
use App\models\EAttrazione;              // Entità attrazione
use App\models\EEvento;                  // Entità evento

/**
 * Classe View per la gestione della visualizzazione dei contenuti da parte dell'amministratore.
 * Permette la visualizzazione e modifica di attrazioni ed eventi, oltre alla dashboard generale.
 */
class VAdminContenuti
{
    // Istanza del motore di template Smarty
    private Smarty $smarty;

    /**
     * Costruttore: inizializza Smarty tramite la configurazione centralizzata
     */
    public function __construct()
    {
        // Avvio del motore Smarty
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il form per aggiungere o modificare un'attrazione.
     * Se è presente un'immagine binaria nell'oggetto, la converte in base64 per l'anteprima.
     *
     * @param EAttrazione|null $attrazione Oggetto attrazione da modificare, oppure null se si sta creando una nuova
     */
    public function mostraFormAttrazione(?EAttrazione $attrazione = null): void
    {
        // Se è stata passata un'attrazione e contiene un'immagine binaria
        if ($attrazione !== null && $attrazione->getImmagine()) {
            // Converte l'immagine in base64 per poterla visualizzare nel form HTML
            $attrazione->base64img = 'data:image/jpeg;base64,' . base64_encode(
                stream_get_contents($attrazione->getImmagine())
            );
        }

        // Passa l'oggetto attrazione al template
        $this->smarty->assign('attrazione', $attrazione);

        // Mostra il template del form per l'attrazione
        $this->smarty->display('admin/attrazione_form.tpl');
    }

    /**
     * Mostra il form per aggiungere o modificare un evento.
     * Se è presente un'immagine, viene codificata in base64 per essere visualizzata nel form.
     *
     * @param EEvento|null $evento Oggetto evento da modificare, oppure null se se ne sta creando uno nuovo
     */
    public function mostraFormEvento(?EEvento $evento = null): void
    {
        // Se è stato passato un evento e contiene un'immagine
        if ($evento !== null && $evento->getImmagine()) {
            // Converte l'immagine in base64 per la visualizzazione nel browser
            $evento->base64img = 'data:image/jpeg;base64,' . base64_encode(
                stream_get_contents($evento->getImmagine())
            );
        }

        // Passa l'oggetto evento al template
        $this->smarty->assign('evento', $evento);

        // Mostra il template del form per l'evento
        $this->smarty->display('admin/evento_form.tpl');
    }

    /**
     * Mostra la homepage dell'amministratore con la lista completa delle attrazioni e degli eventi.
     * Per ogni attrazione/evento con immagine, converte i dati binari in base64 per l'anteprima.
     *
     * @param array $attrazioni Lista delle attrazioni presenti nel sistema
     * @param array $eventi Lista degli eventi presenti nel sistema
     */
    public function mostraHome(array $attrazioni, array $eventi): void
    {
        // Per ogni evento, se ha un'immagine binaria, la converte in base64
        foreach ($eventi as $e) {
            if ($e->getImmagine()) {
                $e->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($e->getImmagine()));
            }
        }

        // Per ogni attrazione, se ha un'immagine binaria, la converte in base64
        foreach ($attrazioni as $a) {
            if ($a->getImmagine()) {
                $a->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($a->getImmagine()));
            }
        }

        // Passa al template entrambe le liste
        $this->smarty->assign('attrazioni', $attrazioni);
        $this->smarty->assign('eventi', $eventi);

        // Mostra la dashboard amministrativa
        $this->smarty->display('admin/admin_home.tpl');
    }
}
