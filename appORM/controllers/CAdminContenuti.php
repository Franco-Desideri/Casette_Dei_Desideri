<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminContenuti;
use App\models\EAttrazione;
use App\models\EEvento;

class CAdminContenuti
{
    // -------- ATTRAZIONI --------

    public function aggiungiAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminContenuti();
        $view->mostraFormAttrazione(null);
    }

    public function modificaAttrazione($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = FPersistentManager::get()->find(EAttrazione::class, $id);
        $view = new VAdminContenuti();
        $view->mostraFormAttrazione($a);
    }

    public function salvaAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = new EAttrazione();
        if (isset($_FILES['immagine']) && is_uploaded_file($_FILES['immagine']['tmp_name'])) {
            $a->setImmagine(file_get_contents($_FILES['immagine']['tmp_name']));
        }
        $a->setDescrizione($_POST['descrizione']);

        FPersistentManager::store($a);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    public function salvaModificaAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = FPersistentManager::get()->find(EAttrazione::class, $_POST['id']);
        if (isset($_FILES['immagine']) && is_uploaded_file($_FILES['immagine']['tmp_name'])) {
            $a->setImmagine(file_get_contents($_FILES['immagine']['tmp_name']));
        }
        $a->setDescrizione($_POST['descrizione']);

        FPersistentManager::store($a);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    public function eliminaAttrazione($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = FPersistentManager::get()->find(EAttrazione::class, $id);
        if ($a) FPersistentManager::delete($a);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    // -------- EVENTI --------

    public function aggiungiEvento(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminContenuti();
        $view->mostraFormEvento(null);
    }

    public function modificaEvento($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = FPersistentManager::get()->find(EEvento::class, $id);
        $view = new VAdminContenuti();
        $view->mostraFormEvento($e);
    }

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

    public function salvaModificaEvento(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = FPersistentManager::get()->find(EEvento::class, $_POST['id']);
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

    public function eliminaEvento($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $e = FPersistentManager::get()->find(EEvento::class, $id);
        if ($e) FPersistentManager::delete($e);

        header('Location: /Casette_Dei_Desideri/AdminContenuti/home');
        exit;
    }

    // -------- HOME ADMIN --------

    public function home(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $attrazioni = FPersistentManager::get()->getRepository(EAttrazione::class)->findAll();
        $eventi = FPersistentManager::get()->getRepository(EEvento::class)->findAll();

        $view = new VAdminContenuti();
        $view->mostraHome($attrazioni, $eventi);
    }
}
