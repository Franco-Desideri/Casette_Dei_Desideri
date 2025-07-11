<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;
use App\services\TechnicalServiceLayer\utility\USession;

/**
 * Classe View per la visualizzazione delle strutture lato utente.
 * Responsabile del rendering:
 * - della lista delle strutture disponibili
 * - del dettaglio di una struttura selezionata
 */
class VStruttura
{
    /**
     * Istanza del motore di template Smarty.
     *
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * Costruttore: inizializza Smarty tramite la configurazione centralizzata.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra l'elenco di tutte le strutture visibili all'utente.
     * Ogni struttura riceve anche la versione base64 dell'immagine principale per l'anteprima.
     *
     * @param EStruttura[] $strutture Array di oggetti struttura da visualizzare.
     * @return void
     */
    public function mostraLista(array $strutture): void
    {
        foreach ($strutture as $s) {
            // Prepara immagine in base64 per visualizzazione immediata in Smarty
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $this->smarty->assign('strutture', $strutture);
        $this->smarty->display('utente/lista_strutture.tpl');
    }

    /**
     * Mostra i dettagli di una singola struttura.
     * Includendo: immagini aggiuntive, intervalli di prezzo/disponibilità e prenotazioni.
     *
     * @param EStruttura $struttura        Oggetto struttura da mostrare.
     * @param array      $foto             Lista di oggetti immagine (già convertiti in base64).
     * @param array      $intervalli       Intervalli di disponibilità/prezzo.
     * @param array      $prenotazioni     Prenotazioni già esistenti per la struttura.
     * @return void
     */
    public function mostraDettaglio(EStruttura $struttura, array $foto, array $intervalli, array $prenotazioni): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('foto', $foto);
        $this->smarty->assign('intervalli', $intervalli);
        $this->smarty->assign('prenotazioni', $prenotazioni);
        $this->smarty->display('utente/dettaglio_struttura.tpl');
    }
}
