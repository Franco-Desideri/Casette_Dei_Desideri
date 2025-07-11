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
    /**
     * Mostra il listino dei prodotti ordinabili all'utente loggato.
     */
    public function listaProdotti(): void
    {
        USession::start();

        // Se l'utente non è loggato, reindirizza al login
        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        // Recupera i prodotti visibili (a quantità e a peso)
        $prodottiQ = FPersistentManager::findBy(EProdottoQuantita::class, ['visibile' => true]);
        $prodottiP = FPersistentManager::findBy(EProdottoPeso::class, ['visibile' => true]);


        $view = new VOrdine();
        $view->mostraListino($prodottiQ, $prodottiP);
    }

    /**
     * Costruisce e mostra il riepilogo dell'ordine sulla base dei dati inviati via POST.
     * Effettua controlli sulla validità dell'ordine e verifica che l'utente sia in soggiorno attivo.
     */
    public function riepilogo(): void
    {
        USession::start();

        // Accetta solo richieste POST
        if (!UHTTPMethods::isPost()) {
            header('Location: /Casette_Dei_Desideri/Ordine/listaProdotti');
            exit;
        }

        $utente = FPersistentManager::find(EUtente::class, USession::get('utente_id'));
        $oggi = new \DateTime();
        $soggiornoAttivo = false;

        // Verifica se l'utente ha un soggiorno attivo (oggi compreso tra check-in e check-out)
        foreach ($utente->getPrenotazioni() as $p) {
            $periodo = $p->getPeriodo();
            if ($oggi >= $periodo->getDataI() && $oggi <= $periodo->getDataF()) {
                $soggiornoAttivo = true;
                break;
            }
        }

        // Se non è in soggiorno attivo, blocca l'ordine
        if (!$soggiornoAttivo) {
            echo "<script>alert('Non puoi ordinare la spesa se non stai pernottando in struttura.'); window.location.href='/Casette_Dei_Desideri/Ordine/listaProdotti';</script>";
            return;
        }

        // Recupera i dati dal form
        $ordineData = $_POST;
        $fascia = $ordineData['fascia_oraria'] ?? null;
        $prodottiQ = $ordineData['quantitaQ'] ?? [];
        $prodottiP = $ordineData['quantitaP'] ?? [];

        $riepilogo = [];
        $prezzoTotale = 0.0;

        // Calcola prodotti a quantità
        foreach ($prodottiQ as $id => $qta) {
            $qta = (int)$qta;
            if ($qta > 0) {
                $prodotto = FPersistentManager::find(EProdottoQuantita::class, (int)$id);
                $prezzo_unitario = $prodotto->getPrezzo();
                $parziale = $prezzo_unitario * $qta;
                $riepilogo[] = [
                    'prodotto_id' => $prodotto->getId(),
                    'tipo' => 'quantita',
                    'quantita' => $qta,
                    'prezzo_unitario' => $prezzo_unitario,
                    'prezzo_totale_riga' => $parziale,
                    'nome' => $prodotto->getNome()
                ];
                $prezzoTotale += $parziale;
            }
        }

        // Calcola prodotti a peso
        foreach ($prodottiP as $id => $grammi) {
            $grammi = (int)$grammi;
            if ($grammi > 0) {
                $prodotto = FPersistentManager::find(EProdottoPeso::class, (int)$id);
                $prezzo_unitario_kg = $prodotto->getPrezzoKg();
                $parziale = ($grammi / 1000) * $prezzo_unitario_kg;
                $riepilogo[] = [
                    'prodotto_id' => $prodotto->getId(),
                    'tipo' => 'peso',
                    'quantita' => $grammi,
                    'prezzo_unitario_kg' => $prezzo_unitario_kg,
                    'prezzo_totale_riga' => $parziale,
                    'nome' => $prodotto->getNome()
                ];
                $prezzoTotale += $parziale;
            }
        }

        // Costruisce dati temporanei dell'ordine e li salva in sessione
        $ordineTemp = [
            'fascia_oraria' => $fascia,
            'prodotti' => $riepilogo,
            'prezzo' => round($prezzoTotale, 2),
        ];

        USession::set('ordine_temp', $ordineTemp);

        $view = new VOrdine();
        $view->mostraRiepilogo($ordineTemp);
    }

    /**
     * Conferma un ordine già preparato (salvato in sessione).
     * Valida i contanti, salva ordine e item nel DB, invia email e mostra pagina di conferma.
     */
    public function conferma(): void
    {
        USession::start();

        if (!USession::exists('ordine_temp')) {
            header('Location: /Casette_Dei_Desideri/Ordine/listaProdotti');
            exit;
        }

        $ordineData = USession::get('ordine_temp');
        $contanti = isset($_POST['contanti']) ? (float) $_POST['contanti'] : 0.0;
        $prezzoTotale = $ordineData['prezzo'];

        // Validazione: contanti insufficienti
        if ($contanti < $prezzoTotale) {
            USession::set('errore_contanti', "L'importo inserito è inferiore al totale dell'ordine.");

            $errore = USession::get('errore_contanti');
            USession::delete('errore_contanti');

            $view = new VOrdine();
            $view->mostraRiepilogo($ordineData, $errore);
            return;
        }

        // Elimina dati temporanei dopo conferma
        USession::delete('ordine_temp');

        $utente = FPersistentManager::find(EUtente::class, USession::get('utente_id'));

        // Crea oggetto ordine
        $ordine = new EOrdine();
        $ordine->setUtente($utente);
        $ordine->setPrezzo($prezzoTotale);
        $ordine->setContanti($contanti);
        $ordine->setData(new DateTime());
        $ordine->setConferma(false); // può essere usato per approvazione futura
        $ordine->setFasciaOraria($ordineData['fascia_oraria']);

        FPersistentManager::get()->persist($ordine);

        // Aggiunge ogni riga come EOrdineItem
        foreach ($ordineData['prodotti'] as $itemData) {
            $item = new EOrdineItem();
            $item->setQuantita((int)$itemData['quantita']);
            $item->setOrdine($ordine);

            if ($itemData['tipo'] === 'quantita') {
                $prodotto = FPersistentManager::find(EProdottoQuantita::class, $itemData['prodotto_id']);
                $item->setProdottoQuantita($prodotto);
            } else {
                $prodotto = FPersistentManager::find(EProdottoPeso::class, $itemData['prodotto_id']);
                $item->setProdottoPeso($prodotto);
            }

            FPersistentManager::get()->persist($item);
        }

        // Salva tutto nel DB
        FPersistentManager::get()->flush();

        // Prepara email con riepilogo
        $mailData = UEmail::email_ordine($utente, $ordine, $ordineData);

        if (isset($mailData['Email'], $mailData['oggetto'], $mailData['contenuto'])) {
            $esito = UEmail::invia($mailData, $utente->getEmail());

            if (!$esito) {
                error_log("Errore invio email ordine all'amministratore.");
            }
        } else {
            error_log("Dati email mancanti. Nessuna email inviata.");
        }

        // Mostra conferma a video
        $view = new VOrdine();
        $view->ConfermaOrdine();
        exit;
    }
}
