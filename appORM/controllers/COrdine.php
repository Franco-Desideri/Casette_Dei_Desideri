<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\utility\UHTTPMethods;
use App\services\TechnicalServiceLayer\utility\UEmail;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FOrdine;
use App\services\TechnicalServiceLayer\foundation\FUtente;
use App\views\VOrdine;
use App\models\EOrdine;
use App\models\EUtente;
use DateTime;

class COrdine
{
    public function listaProdotti(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $utente = FPersistentManager::get()->find('EUtente', USession::get('utente_id'));
        $oggi = new DateTime();

        // Verifica se l’utente ha almeno un soggiorno attivo oggi
        $soggiornoAttivo = false;
        foreach ($utente->getPrenotazioni() as $p) {
            $periodo = $p->getPeriodo();
            if ($oggi >= $periodo->getDataI() && $oggi <= $periodo->getDataF()) {
                $soggiornoAttivo = true;
                break;
            }
        }

        if (!$soggiornoAttivo) {
            echo "Puoi ordinare solo durante un soggiorno attivo.";
            return;
        }

        $prodottiQ = FPersistentManager::get()->findAll('EProdottoQuantita');
        $prodottiP = FPersistentManager::get()->findAll('EProdottoPeso');

        $view = new VOrdine();
        $view->mostraListino($prodottiQ, $prodottiP);
    }

    public function riepilogo(): void
    {
        USession::start();

        if (!UHTTPMethods::isPost()) {
            header('Location: /Casette_Dei_Desideri/Ordine/listaProdotti');
            exit;
        }

        $ordineData = $_POST;
        USession::set('ordine_temp', $ordineData);

        $view = new VOrdine();
        $view->mostraRiepilogo($ordineData);
    }

    public function conferma(): void
    {
        USession::start();

        if (!USession::exists('ordine_temp')) {
            header('Location: /Casette_Dei_Desideri/Ordine/listaProdotti');
            exit;
        }

        $ordineData = USession::get('ordine_temp');
        USession::delete('ordine_temp');

        $utente = FPersistentManager::get()->find('EUtente', USession::get('utente_id'));

        // Crea l’oggetto ordine
        $ordine = new EOrdine();
        $ordine->setUtente($utente);
        $ordine->setPrezzo((float) $ordineData['prezzo']);
        $ordine->setData(new DateTime());
        $ordine->setConferma(false);
        $ordine->setFasciaOraria($ordineData['fascia_oraria'] ?? null);
        $ordine->setContanti((float) $ordineData['contanti']);

        // Verifica se l’importo in contanti è sufficiente
        if ($ordine->getContanti() < $ordine->getPrezzo()) {
            echo "<script>alert('L\'importo in contanti inserito è inferiore al totale dell\'ordine.'); window.location.href='/Casette_Dei_Desideri/Ordine/riepilogo';</script>";
            return;
        }

        // Salvataggio ordine
        FOrdine::creaOrdine($ordine);

        // Invia mail riepilogo
        $admin = FUtente::getAdmin();
        $emailAdmin = $admin?->getEmail() ?? 'fallback@local';
        $oggetto = 'Nuovo ordine ricevuto da un ospite';
        $testo = FOrdine::generaTestoOrdine($ordine);
        UEmail::invia($emailAdmin, $oggetto, $testo);

        // Mostra conferma
        $view = new VOrdine();
        $view->confermaOrdine();
    }
}
