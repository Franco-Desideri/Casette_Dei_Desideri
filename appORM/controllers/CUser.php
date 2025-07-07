<?php

use App\views\VUser;
use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\utility\UHTTPMethods;
use App\services\TechnicalServiceLayer\utility\UValidazione;
use App\services\TechnicalServiceLayer\foundation\FUtente;
use App\models\EUtente;
use App\models\EAttrazione;
use App\models\EEvento;
use App\models\EPrenotazione;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

class CUser
{
    public function login(): void
    {
        USession::start();

        if (USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/home');
            exit;
        }

        $view = new VUser();

        if (UHTTPMethods::isPost()) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validazione base email e password
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
                $view->mostraLoginConErrore("Credenziali non valide");
                return;
            }

            try {
                // Verifica credenziali tramite FUtente
                $utente = FUtente::verificaCredenziali($email, $password);

                USession::set('utente_id', $utente->getId());
                USession::set('ruolo', $utente->getRuolo());

                $dest = $utente->getRuolo() === 'admin' ? 'Admin/profilo' : 'User/home';
                header("Location: /Casette_Dei_Desideri/$dest");
                exit;

            } catch (Exception $e) {
                $view->mostraLoginConErrore($e->getMessage());
            }

        } else {
            $view->mostraLogin();
        }
    }

    public function logout(): void
    {
        USession::start();
        USession::destroy();
        header('Location: /Casette_Dei_Desideri/User/login');
        exit;
    }

    public function profilo(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $utenteId = USession::get('utente_id');
        $utente = FPersistentManager::get()->find(EUtente::class, $utenteId);

        $view = new VUser();
        $view->mostraProfilo($utente);
    }

    public function prenotazione($id): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $prenotazione = FPersistentManager::get()->find(EPrenotazione::class, $id);
        $utenteId = USession::get('utente_id');

        if (!$prenotazione || $prenotazione->getUtente()->getId() !== $utenteId) {
            echo "Accesso negato.";
            return;
        }

        $view = new VUser();
        $view->mostraPrenotazione($prenotazione);
    }

    public function home(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $utenteId = USession::get('utente_id');
        $utente = FPersistentManager::get()->find(EUtente::class, $utenteId);

        if (!$utente) {
            echo "Utente non trovato.";
            exit;
        }

        $em = FPersistentManager::get(); // EntityManager

        $eventi = $em->getRepository(EEvento::class)->findAll();
        $attrazioni = $em->getRepository(EAttrazione::class)->findAll();
        $email = $utente->getEmail();

        $view = new VUser();
        $view->mostraHome($email, $eventi, $attrazioni);
    }


    public function registrazione(): void
    {
        USession::start();

        if (USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/profilo');
            exit;
        }

        $view = new VUser();

        if (UHTTPMethods::isPost()) {
            $nome = $_POST['nome'] ?? '';
            $cognome = $_POST['cognome'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $conferma = $_POST['conferma_password'] ?? '';
            $cf = $_POST['codicefisc'] ?? '';
            $sesso = $_POST['sesso'] ?? '';
            $dataN = $_POST['dataN'] ?? '';
            $luogoN = $_POST['luogoN'] ?? '';
            $telefono = $_POST['tell'] ?? '';

            // Validazioni minime
            if (!UValidazione::emailValida($email)) {
                $view->mostraRegistrazioneConErrore("Email non valida.");
                return;
            }

            if (!UValidazione::passwordSicura($password) || !UValidazione::confermaPassword($password, $conferma)) {
                $view->mostraRegistrazioneConErrore("Le password non corrispondono o sono troppo corte.");
                return;
            }

            if (!UValidazione::codiceFiscaleValido($cf)) {
                $view->mostraRegistrazioneConErrore("Codice fiscale non valido.");
                return;
            }

            if (!UValidazione::sessoValido($sesso)) {
                $view->mostraRegistrazioneConErrore("Sesso non valido.");
                return;
            }

            if (!UValidazione::telefonoValido($telefono)) {
                $view->mostraRegistrazioneConErrore("Numero di telefono non valido.");
                return;
            }

            if (FUtente::getByEmail($email)) {
                $view->mostraRegistrazioneConErrore("Email già registrata.");
                return;
            }

            // Creazione utente
            $utente = new EUtente();
            $utente->setNome($nome);
            $utente->setCognome($cognome);
            $utente->setEmail($email);
            $utente->setPassword($password);
            $utente->setCodicefisc($cf);
            $utente->setSesso($sesso);
            $utente->setDataN(new DateTime($dataN));
            $utente->setLuogoN($luogoN);
            $utente->setTell($telefono);
            $utente->setRuolo("utente");

            FPersistentManager::store($utente);

            USession::set('utente_id', $utente->getId());
            USession::set('ruolo', $utente->getRuolo());

            header('Location: /Casette_Dei_Desideri/User/home');
            exit;
        } else {
            $view->mostraRegistrazione();
        }
    }

    public function modificaEmail(): void
    {
        USession::start();
        $id = USession::get('utente_id');
        $utente = FPersistentManager::get()->find(EUtente::class, $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $newEmail = $_POST['email'];

            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                die("Email non valida.");
            }

            $utente->setEmail($newEmail);
            FPersistentManager::store($utente);

            header("Location: /Casette_Dei_Desideri/User/profilo");
            exit;
        }
    }

    public function modificaTelefono(): void
    {
        USession::start();
        $id = USession::get('utente_id');
        $utente = FPersistentManager::get()->find(EUtente::class, $id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['telefono'])) {
            $telefono = trim($_POST['telefono']);
            $utente->setTell($telefono);
            FPersistentManager::store($utente);

            header("Location: /Casette_Dei_Desideri/User/profilo");
            exit;
        }
    }

    public function riepilogo(int $id): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $prenotazione = FPersistentManager::get()->find(EPrenotazione::class, $id);

        // Verifica che esista e appartenga all'utente loggato
        if (!$prenotazione || $prenotazione->getUtente()->getId() !== USession::get('utente_id')) {
            header('HTTP/1.1 403 Forbidden');
            echo "Prenotazione non trovata o accesso non autorizzato.";
            return;
        }

        $struttura = $prenotazione->getStruttura();
        $periodo = $prenotazione->getPeriodo();
        $ospiti = $prenotazione->getOspitiDettagli();
        $totale = $prenotazione->getPrezzo();

        // Immagine struttura in base64
        $struttura->base64img = $struttura->getImmaginePrincipaleBase64();


        $view = new VUser();
        $view->mostraRiepilogoPrenotazione(
            $prenotazione,
            $struttura,
            $periodo,
            $ospiti,
            $totale
        );
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
}
