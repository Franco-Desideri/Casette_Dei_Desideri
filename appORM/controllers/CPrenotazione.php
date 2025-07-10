<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FPrenotazione;
use App\services\TechnicalServiceLayer\foundation\FLockPrenotazione;
use App\views\VPrenotazione;
use App\models\EStruttura;
use App\models\EUtente;
use App\models\EPrenotazione;
use App\models\EDataPrenotazione;
use App\models\EOspite;
use App\models\ECartaCredito;
use App\models\ELockPrenotazione;
use App\services\TechnicalServiceLayer\utility\UEmail;

class CPrenotazione
{
    public function calcola(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        if (!isset($_POST['idStruttura'], $_POST['dataInizio'], $_POST['dataFine'], $_POST['numOspiti'])) {
            echo "Dati mancanti per la prenotazione.";
            return;
        }

        $idStruttura = (int) $_POST['idStruttura'];
        $dataInizio = new DateTime($_POST['dataInizio']);
        $dataFine = new DateTime($_POST['dataFine']);
        $numOspiti = (int) $_POST['numOspiti'];
        $utenteId = USession::get('utente_id');

        $struttura = FPersistentManager::get()->find(EStruttura::class, $idStruttura);
        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        // === VERIFICHE PRIMA DI BLOCCARE LE DATE ===
        if (!FPrenotazione::copreIntervalli($struttura->getIntervalli(), $dataInizio, $dataFine)) {
            echo "<script>
                alert('Le date selezionate non sono disponibili per questa struttura.');
                window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/" . $idStruttura . "';
            </script>";
            exit;
        }

        if (FPrenotazione::conflittoConPrenotazioni($struttura, $dataInizio, $dataFine)) {
            echo "<script>
                alert('Le date selezionate si sovrappongono a una prenotazione esistente.');
                window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/" . $idStruttura . "';
            </script>";
            exit;
        }

        if ($numOspiti > $struttura->getNumOspiti()) {
            echo "<script>
                alert('Numero di ospiti superiore alla capienza massima della struttura.');
                window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/" . $idStruttura . "';
            </script>";
            exit;
        }

        // === BLOCCO DELLE DATE (solo se tutto è valido) ===
        $lockRepo = new FLockPrenotazione();
        $lockRepo->rimuoviScaduti();

        $oggi = new DateTime();
        $scadenza = (clone $oggi)->modify('+10 minutes');

        $period = new DatePeriod(
            $dataInizio,
            new DateInterval('P1D'),
            (clone $dataFine)->modify('+1 day')
        );

        foreach ($period as $giorno) {
            $data = new DateTime($giorno->format('Y-m-d'));

            if ($lockRepo->esisteLockAttivo($idStruttura, $data)) {
                echo "<script>
                    alert('⚠️ Queste date sono temporaneamente bloccate da un altro utente. Riprova tra 10 minuti o seleziona altre date.');
                    window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/" . $idStruttura . "';
                </script>";
                exit;
            }

            $lock = new ELockPrenotazione();
            $lock->setStrutturaId($idStruttura)
                ->setData($data)
                ->setUtenteId($utenteId)
                ->setScadenza($scadenza);

            $lockRepo->inserisciLock($lock);
        }

        $prezzo = FPrenotazione::calcolaPrezzoTotale($struttura->getIntervalli(), $dataInizio, $dataFine);

        USession::set('prenotazione_temp', [
            'id_struttura' => $idStruttura,
            'data_inizio' => $dataInizio->format('Y-m-d'),
            'data_fine' => $dataFine->format('Y-m-d'),
            'num_ospiti' => $numOspiti,
            'totale' => $prezzo
        ]);

        header("Location: /Casette_Dei_Desideri/Prenotazione/riepilogoParziale");
        exit;
    }




    
    public function riepilogoParziale(): void
    {
        USession::start();
        $data = USession::get('prenotazione_temp');

        if (!$data) {
            echo "Dati di prenotazione non disponibili.";
            return;
        }

        $struttura = FPersistentManager::get()->find(EStruttura::class, $data['id_struttura']);

        $view = new VPrenotazione();
        $view->mostraFormOspiti($struttura); // qui si raccolgono gli ospiti dopo aver mostrato il riepilogo parziale
    }

    public function riepilogoCompleto(): void
    {
        USession::start();

        if (!USession::exists('utente_id') || !USession::exists('prenotazione_temp')) {
            header('Location: /Casette_Dei_Desideri/Struttura/lista');
            exit;
        }

        $data = USession::get('prenotazione_temp');

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ospiti'])) {
            $ospiti = $_POST['ospiti'];

            foreach ($ospiti as $i => $ospite) {
                $ospiti[$i]['documento'] = null;
                if (
                    isset($_FILES['ospiti']['tmp_name'][$i]['documento']) &&
                    is_uploaded_file($_FILES['ospiti']['tmp_name'][$i]['documento'])
                ) {
                    $fileTmp = $_FILES['ospiti']['tmp_name'][$i]['documento'];
                    $fileName = $_FILES['ospiti']['name'][$i]['documento'];

                    $ospiti[$i]['documento'] = base64_encode(file_get_contents($fileTmp));
                    $ospiti[$i]['documento_mime'] = mime_content_type($fileTmp);
                    $ospiti[$i]['documento_ext'] = pathinfo($fileName, PATHINFO_EXTENSION);
                }
            }

            $data['ospiti'] = $ospiti;
            USession::set('prenotazione_temp', $data);
        }

        if (!isset($data['ospiti'])) {
            echo "Dati ospiti mancanti.";
            return;
        }

        $struttura = FPersistentManager::get()->find(EStruttura::class, $data['id_struttura']);

        $view = new VPrenotazione();
        $view->mostraRiepilogoCompleto(
            $struttura,
            $data['data_inizio'],
            $data['data_fine'],
            $data['ospiti'],
            $data['totale']
        );
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

    public function salvaDatiPagamento(): void
    {
        USession::start();

        // Solo POST consentito
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /Casette_Dei_Desideri/Struttura/lista');
            exit;
        }

        // Verifica campi obbligatori
        if (
            empty($_POST['nomeCarta']) ||
            empty($_POST['numeroCarta']) ||
            empty($_POST['scadenza']) ||
            empty($_POST['cvv'])
        ) {
            echo "Dati carta mancanti o incompleti.";
            return;
        }

        // Recupera sessione prenotazione temporanea
        $temp = USession::get('prenotazione_temp') ?? [];

        // Estrae nome e cognome dal campo nomeCarta (es: "Mario Rossi")
        $parts = preg_split('/\s+/', trim($_POST['nomeCarta']), 2);
        $temp['carta_nome'] = $parts[0] ?? '';
        $temp['carta_cognome'] = $parts[1] ?? ''; // vuoto se non specificato

        // Altri campi della carta
        $temp['carta_numero'] = trim($_POST['numeroCarta']);
        $temp['carta_scadenza'] = $_POST['scadenza'] . "-01"; // Y-m → Y-m-d (usiamo il 1° giorno del mese)
        $temp['carta_ccv'] = trim($_POST['cvv']);

        // Salva in sessione
        USession::set('prenotazione_temp', $temp);

        // Reindirizza alla conferma
        header('Location: /Casette_Dei_Desideri/Prenotazione/conferma');
        exit;
    }




    public function conferma(): void
    {
        USession::start();
        $dati = USession::get('prenotazione_temp');

        if (
            !$dati ||
            !isset($dati['id_struttura'], $dati['data_inizio'], $dati['data_fine'], $dati['ospiti'], $dati['totale'],
                $dati['carta_nome'], $dati['carta_cognome'], $dati['carta_numero'], $dati['carta_ccv'], $dati['carta_scadenza'])
        ) {
            echo "Errore: dati di prenotazione o pagamento mancanti o incompleti.";
            return;
        }

        $struttura = FPersistentManager::get()->find(EStruttura::class, $dati['id_struttura']);
        $utente = FPersistentManager::get()->find(EUtente::class, USession::get('utente_id'));

        if (!$struttura || !$utente) {
            echo "Errore: struttura o utente non trovato.";
            return;
        }

        // Crea carta di credito
        $carta = new ECartaCredito();
        $carta->setNomeTitolare($dati['carta_nome']);
        $carta->setCognomeTitolare($dati['carta_cognome']);
        $carta->setNumero($dati['carta_numero']);
        $carta->setCcv($dati['carta_ccv']);
        $carta->setDataScadenza(new DateTime($dati['carta_scadenza']));

        // Crea prenotazione
        $prenotazione = new EPrenotazione();
        $prenotazione->setStruttura($struttura);
        $prenotazione->setUtente($utente);
        $prenotazione->setCartaCredito($carta);
        $prenotazione->setPrezzo($dati['totale']);
        $prenotazione->setPagata(true);
        $prenotazione->setPeriodo(new EDataPrenotazione(
            new DateTime($dati['data_inizio']),
            new DateTime($dati['data_fine'])
        ));


        foreach ($dati['ospiti'] as $ospiteData) {
            $ospite = new EOspite();
            $ospite->setNome($ospiteData['nome']);
            $ospite->setCognome($ospiteData['cognome']);
            $ospite->setDocumento($ospiteData['documento']); // è un BLOB binario o null
            $ospite->setTell($ospiteData['tell']);
            $ospite->setCodiceF($ospiteData['codiceFiscale']);
            $ospite->setSesso($ospiteData['sesso']);
            $ospite->setDataN(new DateTime($ospiteData['dataNascita']));
            $ospite->setLuogoN($ospiteData['luogoNascita']);
            if (isset($ospiteData['documento_mime'])) {
                $ospite->setDocumentoMime($ospiteData['documento_mime']);
            }
            if (isset($ospiteData['documento_ext'])) {
                $ospite->setDocumentoExt($ospiteData['documento_ext']);
            }

            $prenotazione->addOspite($ospite);
        }

        // Verifica e salva la prenotazione
        if (!FPrenotazione::creaPrenotazione($prenotazione)) {
            echo "Errore: impossibile salvare la prenotazione (date non disponibili, ospiti in eccesso o conflitti).";
            return;
        }

        // Rimuove tutti i lock associati all’utente
        $lockRepo = new FLockPrenotazione();
        $lockRepo->rimuoviPerUtente($utente->getId());

    $EmailAData = UEmail::email_prenotazione_admin($utente,$prenotazione);
    $EmailUData = UEmail::email_prenotazione_utente($utente,$prenotazione);

    $esito = UEmail::invia($EmailAData);
    $esitoU = UEmail::invia($EmailUData);

    if (!$esito) {
        error_log("Errore invio email ordine all'amministratore.");
    }

        USession::delete('prenotazione_temp');
        // Redireziona alla pagina di conferma ordine
        $view = new VPrenotazione();
        $view->ConfermaPrenotazione();
        exit;
    }
}
