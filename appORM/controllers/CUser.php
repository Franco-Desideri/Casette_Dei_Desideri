<?php

class CUser
{
    public function login(): void
    {
        USession::start();

        if (USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/profilo');
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
                $dest = $ruolo === 'admin' ? 'Admin/profilo' : 'User/profilo';
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
}
