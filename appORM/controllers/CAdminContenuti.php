<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminContenuti;
use App\models\EAttrazione;
use App\models\EEvento;

class CAdminContenuti
{
    // -------- ATTRAZIONI --------

    /**
     * Mostra il form per aggiungere una nuova attrazione.
     * Non riceve dati; semplicemente carica la vista con un oggetto null.
     */
    public function aggiungiAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminContenuti();
        $view->mostraFormAttrazione(null);
    }

    /**
     * Mostra il form di modifica per un'attrazione esistente.
     * Carica l’attrazione dal database tramite ID.
     */
    public function modificaAttrazione($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = FPersistentManager::find(EAttrazione::class, $id);
        $view = new VAdminContenuti();
        $view->mostraFormAttrazione($a);
    }

    /**
     * Salva una nuova attrazione nel sistema.
     * - Legge i dati POST e FILES.
     * - Crea una nuova istanza EAttrazione.
     * - Salva l'immagine (se caricata) come contenuto binario.
     * - Salva l’oggetto nel database.
     * - Reindirizza alla home amministrativa.
     */
    public function salvaAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = new EAttrazione();

        // Se è stata caricata un'immagine, la legge come contenuto binario
        if (isset($_FILES['immagine']) && is_uploaded_file($_FILES['immagine']['tmp_name'])) {
            $a->setImmagine(file_get_contents($_FILES['immagine']['tmp_name']));
        }

        $a->setDescrizione($_POST['descrizione']);

        FPersistentManager::store($a);

        // Redirect dopo il salvataggio per evitare il reinvio del form
        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    /**
     * Salva le modifiche su un'attrazione esistente.
     * Funzionalità identica a `salvaAttrazione()` ma lavora su oggetto esistente.
     */
    public function salvaModificaAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = FPersistentManager::find(EAttrazione::class, $_POST['id']);

        if (isset($_FILES['immagine']) && is_uploaded_file($_FILES['immagine']['tmp_name'])) {
            $a->setImmagine(file_get_contents($_FILES['immagine']['tmp_name']));
        }

        $a->setDescrizione($_POST['descrizione']);

        FPersistentManager::store($a);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    /**
     * Elimina un'attrazione dal database dato il suo ID.
     */
    public function eliminaAttrazione($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = FPersistentManager::find(EAttrazione::class, $id);
        if ($a) FPersistentManager::delete($a);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    // -------- EVENTI --------

    /**
     * Mostra il form per l’inserimento di un nuovo evento.
     */
    public function aggiungiEvento(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminContenuti();
        $view->mostraFormEvento(null);
    }

    /**
     * Mostra il form di modifica per un evento esistente, caricando i suoi dati.
     */
    public function modificaEvento($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = FPersistentManager::find(EEvento::class, $id);
        $view = new VAdminContenuti();
        $view->mostraFormEvento($e);
    }

    /**
     * Salva un nuovo evento nel sistema.
     * - Legge immagine, titolo e date da POST/FILES.
     * - Salva l’evento nel database.
     */
    public function salvaEvento(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = new EEvento();

        if (isset($_FILES['immagine']) && is_uploaded_file($_FILES['immagine']['tmp_name'])) {
            $e->setImmagine(file_get_contents($_FILES['immagine']['tmp_name']));
        }

        $e->setTitolo($_POST['titolo']);
        $e->setDataInizio(new DateTime($_POST['dataInizio']));
        $e->setDataFine(new DateTime($_POST['dataFine']));

        FPersistentManager::store($e);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    /**
     * Salva modifiche a un evento esistente.  
     * Comportamento identico a `salvaEvento()`, ma su un oggetto esistente.
     */
    public function salvaModificaEvento(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = FPersistentManager::find(EEvento::class, $_POST['id']);

        if (isset($_FILES['immagine']) && is_uploaded_file($_FILES['immagine']['tmp_name'])) {
            $e->setImmagine(file_get_contents($_FILES['immagine']['tmp_name']));
        }

        $e->setTitolo($_POST['titolo']);
        $e->setDataInizio(new DateTime($_POST['dataInizio']));
        $e->setDataFine(new DateTime($_POST['dataFine']));

        FPersistentManager::store($e);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    /**
     * Elimina un evento esistente dal database.
     */
    public function eliminaEvento($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = FPersistentManager::find(EEvento::class, $id);
        if ($e) FPersistentManager::delete($e);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    // -------- HOME ADMIN --------

    /**
     * Mostra la home dell'amministratore contenuti.
     * Elenca tutte le attrazioni e gli eventi per la gestione centralizzata.
     */
    public function home(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $attrazioni = FPersistentManager::findAll(EAttrazione::class);
        $eventi = FPersistentManager::findAll(EEvento::class);


        $view = new VAdminContenuti();
        $view->mostraHome($attrazioni, $eventi);
    }
}
