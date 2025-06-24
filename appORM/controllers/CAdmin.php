<?php

namespace App\controllers;

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdmin;
use App\models\EUtente;
use App\models\EPrenotazione;

class CAdmin
{
    public function profilo(): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $admin = FPersistentManager::get()->find(EUtente::class, USession::get('utente_id'));
        $prenotazioni = FPersistentManager::get()->findAll(EPrenotazione::class);

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

        $prenotazione = FPersistentManager::get()->find(EPrenotazione::class, $id);

        if (!$prenotazione) {
            echo "Prenotazione non trovata.";
            return;
        }

        $view = new VAdmin();
        $view->mostraDettagliPrenotazione($prenotazione);
    }
}
