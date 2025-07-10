<?php

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

        // Usa class::class con namespace corretti
        $admin = FPersistentManager::get()->find(EUtente::class, USession::get('utente_id'));
        $prenotazioni = FPersistentManager::get()->getRepository(EPrenotazione::class)->findAll();

        $view = new VAdmin();
        $view->mostraProfilo($admin, $prenotazioni);
    }


    public function riepilogo(int $id): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prenotazione = FPersistentManager::find(EPrenotazione::class, $id);

        $struttura = $prenotazione->getStruttura();
        $periodo = $prenotazione->getPeriodo();
        $ospiti = $prenotazione->getOspitiDettagli();
        $totale = $prenotazione->getPrezzo();

        // Immagine struttura in base64
        $struttura->base64img = $struttura->getImmaginePrincipaleBase64();

        $ruolo = USession::get('ruolo');


        $view = new VAdmin();
        $view->mostraRiepilogoPrenotazione(
            $prenotazione,
            $struttura,
            $periodo,
            $ospiti,
            $totale,
            $ruolo
        );
    }
}
