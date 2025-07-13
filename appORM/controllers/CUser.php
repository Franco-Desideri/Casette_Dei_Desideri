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
    /**
     * Login utente.
     * - Se l'utente è già autenticato, reindirizza alla home.
     * - Se riceve una POST, verifica le credenziali.
     * - In caso di successo, salva utente e ruolo in sessione e reindirizza.
     * - Altrimenti mostra il form di login con eventuali messaggi di errore.
     */
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
                $view->mostraAutenticazione("Credenziali non valide");
                return;
            }

            try {
                $utente = FUtente::verificaCredenziali($email, $password);

                USession::set('utente_id', $utente->getId());
                USession::set('ruolo', $utente->getRuolo());

                $dest = $utente->getRuolo() === 'admin' ? 'Admin/profilo' : 'User/home';
                header("Location: /Casette_Dei_Desideri/$dest");
                exit;

            } catch (Exception $e) {
                $view->mostraAutenticazione($e->getMessage());
            }
        } else {
            $view->mostraAutenticazione();
        }
    }

    /**
     * Registrazione utente.
     * - Esegue controlli di validazione su tutti i campi.
     * - Verifica che email e codice fiscale non siano già registrati.
     * - In caso di successo, salva l'utente e lo autentica.
     */
    public function registrazione(): void
    {
        USession::start();

        if (USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/profilo');
            exit;
        }

        $view = new VUser();

        if (UHTTPMethods::isPost()) {
            $d = $_POST; // alias veloce

            // Validazioni
            if (!UValidazione::emailValida($d['email'] ?? '')) {
                $view->mostraAutenticazione(null, "Email non valida.");
                return;
            }

            if (!UValidazione::passwordSicura($d['password'] ?? '') ||
                !UValidazione::confermaPassword($d['password'] ?? '', $d['conferma_password'] ?? '')) {
                $view->mostraAutenticazione(null, "Le password non corrispondono o sono troppo corte.");
                return;
            }

            if (!UValidazione::codiceFiscaleValido($d['codicefisc'] ?? '')) {
                $view->mostraAutenticazione(null, "Codice fiscale non valido.");
                return;
            }

            if (!UValidazione::sessoValido($d['sesso'] ?? '')) {
                $view->mostraAutenticazione(null, "Sesso non valido.");
                return;
            }

            if (!UValidazione::telefonoValido($d['tell'] ?? '')) {
                $view->mostraAutenticazione(null, "Numero di telefono non valido.");
                return;
            }

            if (FUtente::getByEmail($d['email'])) {
                $view->mostraAutenticazione(null, "Email già registrata.");
                return;
            }

            if (FUtente::getByCodiceFiscale($d['codicefisc'])) {
                $view->mostraAutenticazione(null, "Codice fiscale già registrato.");
                return;
            }

            // Creazione e salvataggio utente
            $utente = new EUtente();
            $utente->setNome($d['nome']);
            $utente->setCognome($d['cognome']);
            $utente->setEmail($d['email']);
            $utente->setPassword($d['password']);
            $utente->setCodicefisc($d['codicefisc']);
            $utente->setSesso($d['sesso']);
            $utente->setDataN(new DateTime($d['dataN']));
            $utente->setLuogoN($d['luogoN']);
            $utente->setTell($d['tell']);
            $utente->setRuolo("utente");

            FPersistentManager::store($utente);

            USession::set('utente_id', $utente->getId());
            USession::set('ruolo', $utente->getRuolo());

            header('Location: /Casette_Dei_Desideri/User/home');
            exit;

        } else {
            $view->mostraAutenticazione();
        }
    }

    /**
     * Logout utente: chiude la sessione e reindirizza alla home.
     */
    public function logout(): void
    {
        USession::start();
        USession::destroy();
        header('Location: /Casette_Dei_Desideri/User/home');
        exit;
    }

    /**
     * Mostra il profilo dell’utente loggato.
     */
    public function profilo(): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $utenteId = USession::get('utente_id');
        $utente = FUtente::getById($utenteId);

        $view = new VUser();
        $view->mostraProfilo($utente);
    }

    /**
     * Home per l’utente loggato.
     * - Se admin, viene reindirizzato alla sua dashboard.
     * - Altrimenti mostra eventi e attrazioni.
     */
    public function home(): void
    {
        USession::start();

        if (USession::get('ruolo') === 'admin') {
            header('Location: /Casette_Dei_Desideri/Admin/profilo');
            exit;
        }

        $eventi = FPersistentManager::findAll(EEvento::class);
        $attrazioni = FPersistentManager::findAll(EAttrazione::class);

        $view = new VUser();
        $view->mostraHome($eventi, $attrazioni);
    }

    /**
     * Permette di aggiornare l’email dell’utente loggato.
     */
    public function modificaEmail(): void
    {
        USession::start();
        $id = USession::get('utente_id');
        $utente = FUtente::getById($id);

        if (UHTTPMethods::isPost() && isset($_POST['email'])) {
            $newEmail = $_POST['email'];

            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                die("Email non valida.");
            }

            FUtente::aggiornaEmail($utente, $newEmail);
            header("Location: /Casette_Dei_Desideri/User/profilo");
            exit;
        }
    }

    /**
     * Permette di aggiornare il numero di telefono dell’utente loggato.
     */
    public function modificaTelefono(): void
    {
        USession::start();
        $utenteId = USession::get('utente_id');
        $utente = FUtente::getById($utenteId);

        if (UHTTPMethods::isPost() && isset($_POST['telefono'])) {
            $telefono = trim($_POST['telefono']);

            if (!UValidazione::telefonoValido($telefono)) {
                die("Numero di telefono non valido.");
            }

            FUtente::aggiornaTelefono($utente, $telefono);

            header("Location: /Casette_Dei_Desideri/User/profilo");
            exit;
        }
    }

    /**
     * Mostra il riepilogo di una prenotazione dell’utente autenticato.
     * - Controlla che l’utente sia il proprietario della prenotazione.
     * - Prepara i dati per la vista, convertendo gli oggetti ospite in array.
     */
    public function riepilogo(int $id): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $prenotazione = FPersistentManager::find(EPrenotazione::class, $id);

        if (!$prenotazione || $prenotazione->getUtente()->getId() !== USession::get('utente_id')) {
            header('HTTP/1.1 403 Forbidden');
            echo "Prenotazione non trovata o accesso non autorizzato.";
            return;
        }

        $struttura = $prenotazione->getStruttura();
        $periodo = $prenotazione->getPeriodo();
        $ospiti = $prenotazione->getOspitiDettagli();
        $totale = $prenotazione->getPrezzo();

        $struttura->base64img = $struttura->getImmaginePrincipaleBase64();

        // Conversione ospiti in array compatibile con Smarty
        $ospitiArray = [];

        foreach ($ospiti as $ospite) {
            $documento = $ospite->getDocumento();
            $docContent = null;

            if ($documento) {
                $docContent = is_resource($documento)
                    ? stream_get_contents($documento)
                    : $documento;
            }

            $ospitiArray[] = [
                'nome' => $ospite->getNome(),
                'cognome' => $ospite->getCognome(),
                'tell' => $ospite->getTell(),
                'codiceFiscale' => $ospite->getCodiceF(),
                'sesso' => $ospite->getSesso(),
                'dataNascita' => $ospite->getDataN()->format('d/m/Y'),
                'luogoNascita' => $ospite->getLuogoN(),
                'documento_base64' => $docContent ? base64_encode($docContent) : null,
                'documento_mime' => $ospite->getDocumentoMime(),
                'documento_ext' => $ospite->getDocumentoExt()
            ];
        }

        $ruolo = USession::get('ruolo');

        $view = new VUser();
        $view->mostraRiepilogoPrenotazione(
            $prenotazione,
            $struttura,
            $periodo,
            $ospitiArray,
            $totale,
            $ruolo
        );
    }
}
