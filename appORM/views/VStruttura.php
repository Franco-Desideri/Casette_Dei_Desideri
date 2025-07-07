<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;
use App\services\TechnicalServiceLayer\utility\USession;

/**
 * Classe View per la visualizzazione delle strutture lato utente.
 */
class VStruttura
{
    private Smarty $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    public function mostraLista(array $strutture): void
    {
        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $this->smarty->assign('strutture', $strutture);
        $this->smarty->display('utente/lista_strutture.tpl');
    }


    /**
     * Mostra i dettagli di una struttura con foto, intervalli, prenotazioni.
     *
     * @param EStruttura $struttura
     * @param array $foto
     * @param array $intervalli
     * @param array $prenotazioni
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
