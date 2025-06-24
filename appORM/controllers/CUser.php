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
        $utente = FPersistentManager::get()->find('EUtente', $utenteId);

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

        $prenotazione = FPersistentManager::get()->find('EPrenotazione', $id);
        $utenteId = USession::get('utente_id');

        if (!$prenotazione || $prenotazione->getUtente()->getId() !== $utenteId) {
            echo "Accesso negato.";
            return;
        }

        $view = new VUser();
        $view->mostraPrenotazione($prenotazione);
    }

    // HOMEPAGE UTENTE CON ATTRAZIONI + EVENTI
    public function home(): void
    {
        USession::start();

        $em = FPersistentManager::get(); // ottieni EntityManager

        $eventi = $em->getRepository(EEvento::class)->findAll();
        $attrazioni = $em->getRepository(EAttrazione::class)->findAll();

        $view = new VUser();
        $view->mostraHome($eventi, $attrazioni);
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
}
