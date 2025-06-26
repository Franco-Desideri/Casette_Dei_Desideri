<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FIntervallo;
use App\views\VPrenotazione;
use App\models\EStruttura;
use App\models\EUtente;
use App\models\EPrenotazione;
use App\models\EDataPrenotazione;
use App\models\EOspite;

/**
 * Controller per la gestione delle prenotazioni
 */
class CPrenotazione
{
    public function dettagliOspiti($idStruttura): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $struttura = FPersistentManager::get()->find('EStruttura', $idStruttura);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        $view = new VPrenotazione();
        $view->mostraFormOspiti($struttura);
    }

    public function riepilogo(): void
    {
        USession::start();

        if (!USession::exists('utente_id') || !USession::exists('prenotazione_temp')) {
            header('Location: /Casette_Dei_Desideri/Struttura/lista');
            exit;
        }

        $data = USession::get('prenotazione_temp');
        $struttura = FPersistentManager::get()->find('EStruttura', $data['id_struttura']);

        $totale = FIntervallo::calcolaPrezzoTotale(
            $struttura,
            new DateTime($data['data_inizio']),
            new DateTime($data['data_fine'])
        );

        $view = new VPrenotazione();
        $view->mostraRiepilogo($struttura, $data['data_inizio'], $data['data_fine'], $data['ospiti'], $totale);
    }

    public function pagamento(): void
    {
        USession::start();

        if (!USession::exists('utente_id') || !USession::exists('prenotazione_temp')) {
            header('Location: /Casette_Dei_Desideri/Struttura/lista');
            exit;
        }

        $view = new VPrenotazione();
        $view->mostraPagamento();
    }

    public function conferma(): void
    {
        USession::start();

        $dati = USession::get('prenotazione_temp');
        $struttura = FPersistentManager::get()->find('EStruttura', $dati['id_struttura']);
        $utente = FPersistentManager::get()->find('EUtente', USession::get('utente_id'));

        $prenotazione = new EPrenotazione();
        $prenotazione->setStruttura($struttura);
        $prenotazione->setUtente($utente);
        $prenotazione->setOspiti(count($dati['ospiti']));
        $prenotazione->setPrezzo($dati['totale']);
        $prenotazione->setPagata(true);
        $prenotazione->setPeriodo(new EDataPrenotazione(
            new DateTime($dati['data_inizio']),
            new DateTime($dati['data_fine'])
        ));

        foreach ($dati['ospiti'] as $ospiteData) {
            $ospite = new EOspite(
                $ospiteData['nome'],
                $ospiteData['cognome'],
                $ospiteData['documento'],
                $ospiteData['tell'],
                $ospiteData['codiceFiscale'],
                $ospiteData['sesso'],
                new DateTime($ospiteData['dataNascita']),
                $ospiteData['luogoNascita']
            );
            $prenotazione->addOspite($ospite);
        }

        FPersistentManager::store($prenotazione);
        USession::delete('prenotazione_temp');

        header('Location: /Casette_Dei_Desideri/Struttura/lista');
        exit;
    }
}
