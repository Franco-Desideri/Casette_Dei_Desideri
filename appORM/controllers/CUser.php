<?php

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

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
                $view->mostraLoginConErrore("Credenziali non valide");
                return;
            }

            $utente = FUtente::getByEmail($email);

            if ($utente && FUtente::verificaPassword($password, $utente->getPassword())) {
                USession::set('utente_id', $utente->getId());
                USession::set('ruolo', $utente->getRuolo());

                $ruolo = $utente->getRuolo();
                $dest = $ruolo === 'admin' ? 'Admin/profilo' : 'User/home';
                header("Location: /Casette_Dei_Desideri/$dest");
                exit;
            } else {
                $view->mostraLoginConErrore("Email o password errata");
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

        $eventi = FPersistentManager::get()->findAll('EEvento');
        $attrazioni = FPersistentManager::get()->findAll('EAttrazione');

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
            $utente->setPassword(FUtente::criptaPassword($password));
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
