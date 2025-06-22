<?php

/**
 * Controller per la visualizzazione delle strutture lato utente
 */
class CStruttura
{
    /**
     * Mostra la lista di tutte le strutture disponibili
     */
    public function lista(): void
    {
        USession::start();

        $strutture = FPersistentManager::get()->findAll('EStruttura');

        $view = new VStruttura();
        $view->mostraLista($strutture);
    }

    /**
     * Mostra i dettagli di una struttura specifica (con calendario disponibilità)
     *
     * @param int $id ID della struttura
     */
    public function dettaglio($id): void
    {
        USession::start();

        $struttura = FPersistentManager::get()->find('EStruttura', $id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        $prenotazioni = $struttura->getPrenotazioni();
        $intervalli = $struttura->getIntervalli();

        $view = new VStruttura();
        $view->mostraDettaglio($struttura, $prenotazioni, $intervalli);
    }

    /**
     * Avvia la prenotazione di una struttura (step successivo: ospiti)
     *
     * @param int $id ID della struttura
     */
    public function prenota($id): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $struttura = FPersistentManager::get()->find('EStruttura', $id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        USession::set('struttura_prenotazione', $id);
        header('Location: /Casette_Dei_Desideri/Prenotazione/dettagliOspiti/' . $id);
        exit;
    }
}
