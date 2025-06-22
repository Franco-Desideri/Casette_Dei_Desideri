<?php

class CAdmin
{
    public function profilo(): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $admin = FPersistentManager::get()->find('EUtente', USession::get('utente_id'));
        $prenotazioni = FPersistentManager::get()->findAll('EPrenotazione');

        $view = new VAdmin();
        $view->mostraProfilo($admin, $prenotazioni);
    }

    public function prenotazione($id): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prenotazione = FPersistentManager::get()->find('EPrenotazione', $id);

        if (!$prenotazione) {
            echo "Prenotazione non trovata.";
            return;
        }

        $view = new VAdmin();
        $view->mostraDettagliPrenotazione($prenotazione);
    }
}
