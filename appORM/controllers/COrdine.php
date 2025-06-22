<?php

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

        $ordine = USession::get('ordine_temp');
        USession::delete('ordine_temp');

        $emailAdmin = 'admin@casette.local';
        $oggetto = 'Nuovo ordine ricevuto da un ospite';
        $testo = FOrdine::generaTestoOrdine($ordine);

        UEmail::invia($emailAdmin, $oggetto, $testo);

        $view = new VOrdine();
        $view->confermaOrdine();
    }
}
