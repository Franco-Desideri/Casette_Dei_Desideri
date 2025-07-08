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

        $prodottiQ = FPersistentManager::get()->getRepository(EProdottoQuantita::class)->findBy(['visibile' => true]);
        $prodottiP = FPersistentManager::get()->getRepository(EProdottoPeso::class)->findBy(['visibile' => true]);


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

        /*if (!$soggiornoAttivo) {
            echo "<script>alert('Non puoi ordinare la spesa se non stai pernottando in struttura.'); window.location.href='/Casette_Dei_Desideri/Ordine/listaProdotti';</script>";
            return;
        }*/

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
                $prezzo_unitario = $prodotto->getPrezzo(); // <-- Recupera il prezzo unitario
                $parziale = $prezzo_unitario * $qta; // Calcola il totale per la riga
                $riepilogo[] = [
                    'prodotto_id' => $prodotto->getId(),
                    'tipo' => 'quantita',
                    'quantita' => $qta,
                    'prezzo_unitario' => $prezzo_unitario, // <-- NUOVO: Prezzo unitario
                    'prezzo_totale_riga' => $parziale,     // <-- NUOVO: Totale per questa riga
                    'nome' => $prodotto->getNome()
                ];
                $prezzoTotale += $parziale;
            }
        }

        foreach ($prodottiP as $id => $grammi) {
            $grammi = (int)$grammi;
            if ($grammi > 0) {
                $prodotto = FPersistentManager::get()->find(EProdottoPeso::class, (int)$id);
                $prezzo_unitario_kg = $prodotto->getPrezzoKg(); // <-- Recupera il prezzo unitario al kg
                $parziale = ($grammi / 1000) * $prezzo_unitario_kg; // Calcola il totale per la riga
                $riepilogo[] = [
                    'prodotto_id' => $prodotto->getId(),
                    'tipo' => 'peso',
                    'quantita' => $grammi,
                    'prezzo_unitario_kg' => $prezzo_unitario_kg, // <-- NUOVO: Prezzo unitario al kg
                    'prezzo_totale_riga' => $parziale,          // <-- NUOVO: Totale per questa riga
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
    //USession::delete('ordine_temp');

    $contanti = isset($_POST['contanti']) ? (float) $_POST['contanti'] : 0.0;
    $prezzoTotale = $ordineData['prezzo'];

    if ($contanti < $prezzoTotale) {
    USession::set('errore_contanti', "L'importo inserito è inferiore al totale dell'ordine.");
    
    $errore = USession::get('errore_contanti');
    USession::delete('errore_contanti');

    // Ricrea i dati del riepilogo
    //$ordineTemp = USession::get('ordine_temp');
    $view = new VOrdine();
    $view->mostraRiepilogo($ordineData, $errore);

    return;
}
    USession::delete('ordine_temp');


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

    $admin = FPersistentManager::get()->getRepository(EUtente::class)->findBy(['ruolo' => 'admin']);

    if (!$admin || count($admin) === 0) {
        error_log("Errore: nessun amministratore trovato per inviare la mail.");
        return;
    }

    $adminEmail = $admin[0]->getEmail();

    // Costruzione contenuto email
    $contenuto = "Hai ricevuto un nuovo ordine!\n\n";
    $contenuto .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
    $contenuto .= "Email cliente: " . $utente->getEmail() . "\n";
    $contenuto .= "Fascia oraria di consegna: " . $ordine->getFasciaOraria() . "\n";
    $contenuto .= "Importo totale: " . number_format($ordine->getPrezzo(), 2) . " €\n";
    $contenuto .= "Taglio di banconota fornito: " . number_format($ordine->getContanti(), 2) . " €\n\n";
    $contenuto .= "Prodotti ordinati:\n";

    foreach ($ordineData['prodotti'] as $itemData) {
    $nome = '';
    if ($itemData['tipo'] === 'quantita') {
        $prodotto = FPersistentManager::get()->find(EProdottoQuantita::class, $itemData['prodotto_id']);
    } else {
        $prodotto = FPersistentManager::get()->find(EProdottoPeso::class, $itemData['prodotto_id']);
    }

    $nome = $prodotto->getNome();
    $qta = $itemData['quantita'];
    $contenuto .= "- {$nome} x{$qta}\n";
}


    $oggetto = "Nuovo ordine da " . $utente->getNome() . " " . $utente->getCognome();

    // Invio
    $esito = UEmail::invia($adminEmail, $oggetto, $contenuto, $utente->getEmail());

    if (!$esito) {
        error_log("Errore invio email ordine all'amministratore.");
    }

    // Redireziona alla pagina di conferma ordine
    $view = new VOrdine();
    $view->ConfermaOrdine();
    exit;
    }
}