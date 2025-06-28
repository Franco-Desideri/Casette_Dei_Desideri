<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\utility\UHTTPMethods;
use App\services\TechnicalServiceLayer\utility\UEmail;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FOrdine;
use App\services\TechnicalServiceLayer\foundation\FUtente;
use App\views\VOrdine;
use App\models\EOrdine;
use App\models\EOrdineItem;
use App\models\EUtente;
use App\models\EProdottoQuantita;
use App\models\EProdottoPeso;

class COrdine
{
    public function listaProdotti(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $prodottiQ = FPersistentManager::get()->getRepository(EProdottoQuantita::class)->findAll();
        $prodottiP = FPersistentManager::get()->getRepository(EProdottoPeso::class)->findAll();

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

        $utente = FPersistentManager::get()->find(EUtente::class, USession::get('utente_id'));
        $oggi = new \DateTime();

        $soggiornoAttivo = false;
        foreach ($utente->getPrenotazioni() as $p) {
            $periodo = $p->getPeriodo();
            if ($oggi >= $periodo->getDataI() && $oggi <= $periodo->getDataF()) {
                $soggiornoAttivo = true;
                break;
            }
        }

        if (!$soggiornoAttivo) {
            echo "<script>alert('Non puoi ordinare la spesa se non stai pernottando in struttura.'); window.location.href='/Casette_Dei_Desideri/Ordine/listaProdotti';</script>";
            return;
        }

        $ordineData = $_POST;
        $fascia = $ordineData['fascia_oraria'] ?? null;
        $prodottiQ = $ordineData['quantitaQ'] ?? [];
        $prodottiP = $ordineData['quantitaP'] ?? [];

        $riepilogo = [];
        $prezzoTotale = 0.0;

        foreach ($prodottiQ as $id => $qta) {
            $qta = (int)$qta;
            if ($qta > 0) {
                $prodotto = FPersistentManager::get()->find(EProdottoQuantita::class, (int)$id);
                $parziale = $prodotto->getPrezzo() * $qta;
                $riepilogo[] = [
                    'prodotto_id' => $prodotto->getId(),
                    'tipo' => 'quantita',
                    'quantita' => $qta,
                    'prezzo' => $parziale,
                    'nome' => $prodotto->getNome()
                ];
                $prezzoTotale += $parziale;
            }
        }

        foreach ($prodottiP as $id => $grammi) {
            $grammi = (int)$grammi;
            if ($grammi > 0) {
                $prodotto = FPersistentManager::get()->find(EProdottoPeso::class, (int)$id);
                $parziale = ($grammi / 1000) * $prodotto->getPrezzoKg();
                $riepilogo[] = [
                    'prodotto_id' => $prodotto->getId(),
                    'tipo' => 'peso',
                    'quantita' => $grammi,
                    'prezzo' => $parziale,
                    'nome' => $prodotto->getNome()
                ];
                $prezzoTotale += $parziale;
            }
        }

        $ordineTemp = [
            'fascia_oraria' => $fascia,
            'prodotti' => $riepilogo,
            'prezzo' => round($prezzoTotale, 2),
        ];

        USession::set('ordine_temp', $ordineTemp);

        $view = new VOrdine();
        $view->mostraRiepilogo($ordineTemp);
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

        $contanti = isset($_POST['contanti']) ? (float) $_POST['contanti'] : 0.0;
        $prezzoTotale = $ordineData['prezzo'];

        if ($contanti < $prezzoTotale) {
            echo "<script>alert('L\'importo inserito è inferiore al totale dell\'ordine.'); window.location.href='/Casette_Dei_Desideri/Ordine/riepilogo';</script>";
            return;
        }

        $utente = FPersistentManager::get()->find(EUtente::class, USession::get('utente_id'));

        // Crea ordine
        $ordine = new EOrdine();
        $ordine->setUtente($utente);
        $ordine->setPrezzo($prezzoTotale);
        $ordine->setContanti($contanti);
        $ordine->setData(new DateTime());
        $ordine->setConferma(false);
        $ordine->setFasciaOraria($ordineData['fascia_oraria']);

        FPersistentManager::get()->persist($ordine);

        // Aggiunge item
        foreach ($ordineData['prodotti'] as $itemData) {
            $item = new EOrdineItem();
            $item->setQuantita((int)$itemData['quantita']);
            $item->setOrdine($ordine);

            if ($itemData['tipo'] === 'quantita') {
                $prodotto = FPersistentManager::get()->find(EProdottoQuantita::class, $itemData['prodotto_id']);
                $item->setProdottoQuantita($prodotto);
            } else {
                $prodotto = FPersistentManager::get()->find(EProdottoPeso::class, $itemData['prodotto_id']);
                $item->setProdottoPeso($prodotto);
            }

            FPersistentManager::get()->persist($item);
        }

        FPersistentManager::get()->flush();

        // Invia mail riepilogo
        $admin = FUtente::getAdmin();
        $emailAdmin = $admin?->getEmail() ?? 'fallback@local';
        $oggetto = 'Nuovo ordine ricevuto da un ospite';
        $testo = FOrdine::generaTestoOrdine($ordine);
        UEmail::invia($emailAdmin, $oggetto, $testo);

        // Messaggio conferma
        $view = new VOrdine();
        $view->confermaOrdine();
    }
}
