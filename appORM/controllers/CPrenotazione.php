<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\utility\UHTTPMethods;
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
    /**
     * Metodo che calcola il preventivo per una prenotazione.
     * - Verifica disponibilità della struttura nelle date richieste.
     * - Controlla conflitti con altre prenotazioni.
     * - Blocca temporaneamente le date con un sistema di lock.
     * - Calcola il prezzo totale e salva tutto in sessione.
     */
    public function calcola(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        // Verifica parametri obbligatori POST
        if (!isset($_POST['idStruttura'], $_POST['dataInizio'], $_POST['dataFine'], $_POST['numOspiti'])) {
            echo "Dati mancanti per la prenotazione.";
            return;
        }

        $idStruttura = (int) $_POST['idStruttura'];
        $dataInizio = new DateTime($_POST['dataInizio']);
        $dataFine = new DateTime($_POST['dataFine']);
        $numOspiti = (int) $_POST['numOspiti'];
        $utenteId = USession::get('utente_id');

        $struttura = FPersistentManager::find(EStruttura::class, $idStruttura);
        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        // Verifica che le date siano coperte da intervalli validi
        if (!FPrenotazione::copreIntervalli($struttura->getIntervalli(), $dataInizio, $dataFine)) {
            echo "<script>
                alert('Le date selezionate non sono disponibili per questa struttura.');
                window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/$idStruttura';
            </script>";
            exit;
        }

        // Verifica che le date non si sovrappongano ad altre prenotazioni
        if (FPrenotazione::conflittoConPrenotazioni($struttura, $dataInizio, $dataFine)) {
            echo "<script>
                alert('Le date selezionate si sovrappongono a una prenotazione esistente.');
                window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/$idStruttura';
            </script>";
            exit;
        }

        // Verifica capienza
        if ($numOspiti > $struttura->getNumOspiti()) {
            echo "<script>
                alert('Numero di ospiti superiore alla capienza massima della struttura.');
                window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/$idStruttura';
            </script>";
            exit;
        }

        // === BLOCCO TEMPORANEO DELLE DATE ===
        $lockRepo = new FLockPrenotazione();
        $lockRepo->rimuoviScaduti(); // pulizia lock vecchi

        $oggi = new DateTime();
        $scadenza = (clone $oggi)->modify('+10 minutes');

        $period = new DatePeriod($dataInizio, new DateInterval('P1D'), (clone $dataFine)->modify('+1 day'));

        foreach ($period as $giorno) {
            $data = new DateTime($giorno->format('Y-m-d'));

            if ($lockRepo->esisteLockAttivo($idStruttura, $data)) {
                echo "<script>
                    alert('⚠️ Queste date sono temporaneamente bloccate da un altro utente. Riprova tra 10 minuti o seleziona altre date.');
                    window.location.href = '/Casette_Dei_Desideri/Struttura/dettaglio/$idStruttura';
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

        // Calcola prezzo totale per le date
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

    /**
     * Mostra il riepilogo parziale della prenotazione e il form per inserire gli ospiti.
     */
    public function riepilogoParziale(): void
    {
        USession::start();
        $data = USession::get('prenotazione_temp');

        if (!$data) {
            echo "Dati di prenotazione non disponibili.";
            return;
        }

        $struttura = FPersistentManager::find(EStruttura::class, $data['id_struttura']);
        $view = new VPrenotazione();
        $view->mostraFormOspiti($struttura);
    }

    /**
     * Riepilogo completo dopo inserimento ospiti.
     * - Salva eventuali documenti.
     * - Mostra il riepilogo dettagliato (prima del pagamento).
     */
    public function riepilogoCompleto(): void
    {
        USession::start();

        if (!USession::exists('utente_id') || !USession::exists('prenotazione_temp')) {
            header('Location: /Casette_Dei_Desideri/Struttura/lista');
            exit;
        }

        $data = USession::get('prenotazione_temp');

        if (UHTTPMethods::isPost() && isset($_POST['ospiti'])) {
            $ospiti = $_POST['ospiti'];

            foreach ($ospiti as $i => $ospite) {
                $ospiti[$i]['documento'] = null;
                if (isset($_FILES['ospiti']['tmp_name'][$i]['documento']) &&
                    is_uploaded_file($_FILES['ospiti']['tmp_name'][$i]['documento'])) {

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

        $struttura = FPersistentManager::find(EStruttura::class, $data['id_struttura']);

        $view = new VPrenotazione();
        $view->mostraRiepilogoCompleto(
            $struttura,
            $data['data_inizio'],
            $data['data_fine'],
            $data['ospiti'],
            $data['totale']
        );
    }

    /**
     * Mostra la pagina per il pagamento (inserimento dati carta).
     */
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

    /**
     * Salva i dati della carta di credito nella sessione temporanea.
     */
    public function salvaDatiPagamento(): void
    {
        USession::start();

        if (!UHTTPMethods::isPost()) {
            header('Location: /Casette_Dei_Desideri/Struttura/lista');
            exit;
        }

        if (empty($_POST['nomeCarta']) || empty($_POST['cognomeCarta']) ||
            empty($_POST['numeroCarta']) || empty($_POST['scadenza']) || empty($_POST['cvv'])) {
            echo "Dati carta mancanti o incompleti.";
            return;
        }

        $temp = USession::get('prenotazione_temp') ?? [];

        $temp['carta_nome'] = trim($_POST['nomeCarta']);
        $temp['carta_cognome'] = trim($_POST['cognomeCarta']);
        $temp['carta_numero'] = trim($_POST['numeroCarta']);
        $temp['carta_scadenza'] = $_POST['scadenza'] . "-01";
        $temp['carta_ccv'] = trim($_POST['cvv']);

        USession::set('prenotazione_temp', $temp);

        header('Location: /Casette_Dei_Desideri/Prenotazione/conferma');
        exit;
    }

    /**
     * Metodo finale: conferma della prenotazione.
     * - Crea gli oggetti entità (carta, ospiti, prenotazione).
     * - Salva tutto nel database.
     * - Invia email a utente e admin.
     */
    public function conferma(): void
    {
        USession::start();
        $dati = USession::get('prenotazione_temp');

        if (!$dati || !isset($dati['id_struttura'], $dati['data_inizio'], $dati['data_fine'], $dati['ospiti'], $dati['totale'],
                              $dati['carta_nome'], $dati['carta_cognome'], $dati['carta_numero'], $dati['carta_ccv'], $dati['carta_scadenza'])) {
            echo "Errore: dati di prenotazione o pagamento mancanti o incompleti.";
            return;
        }

        $struttura = FPersistentManager::find(EStruttura::class, $dati['id_struttura']);
        $utente = FPersistentManager::find(EUtente::class, USession::get('utente_id'));

        if (!$struttura || !$utente) {
            echo "Errore: struttura o utente non trovato.";
            return;
        }

        $carta = new ECartaCredito();
        $carta->setNomeTitolare($dati['carta_nome']);
        $carta->setCognomeTitolare($dati['carta_cognome']);
        $carta->setNumero($dati['carta_numero']);
        $carta->setCcv($dati['carta_ccv']);
        $carta->setDataScadenza(new DateTime($dati['carta_scadenza']));

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
            $ospite->setDocumento($ospiteData['documento']);
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

        if (!FPrenotazione::creaPrenotazione($prenotazione)) {
            echo "Errore: impossibile salvare la prenotazione (date non disponibili, ospiti in eccesso o conflitti).";
            return;
        }

        // Rimuove tutti i lock temporanei
        $lockRepo = new FLockPrenotazione();
        $lockRepo->rimuoviPerUtente($utente->getId());

        // Invia email
        $EmailAData = UEmail::email_prenotazione_admin($utente, $prenotazione);
        $EmailUData = UEmail::email_prenotazione_utente($utente, $prenotazione);

        $esito = UEmail::invia($EmailAData);
        $esitoU = UEmail::invia($EmailUData);

        if (!$esito) {
            error_log("Errore invio email ordine all'amministratore.");
        }

        USession::delete('prenotazione_temp');

        $view = new VPrenotazione();
        $view->ConfermaPrenotazione();
        exit;
    }
}
