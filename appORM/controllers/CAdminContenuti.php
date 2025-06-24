<?php

namespace App\controllers;

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminContenuti;
use App\models\EAttrazione;
use App\models\EEvento;
use DateTime;

class CAdminContenuti
{
    // -------- ATTRAZIONI --------
    public function listaAttrazioni(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $attrazioni = FPersistentManager::get()->findAll(EAttrazione::class);
        $view = new VAdminContenuti();
        $view->mostraListaAttrazioni($attrazioni);
    }

    public function aggiungiAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminContenuti();
        $view->mostraFormAttrazione(); // form vuoto
    }

    public function salvaAttrazione(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $a = new EAttrazione();
        $a->setImmagine($_POST['immagine']);
        $a->setDescrizione($_POST['descrizione']);

        FPersistentManager::store($a);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/listaAttrazioni');
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

    public function salvaModificaAttrazione(): void {
        USession::start();
        $a = FPersistentManager::get()->find(EAttrazione::class, $_POST['id']);
        $a->setImmagine($_POST['immagine']);
        $a->setDescrizione($_POST['descrizione']);
        FPersistentManager::store($a);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/listaAttrazioni');
    }

    public function eliminaAttrazione($id): void {
        USession::start();
        $a = FPersistentManager::get()->find(EAttrazione::class, $id);
        if ($a) FPersistentManager::delete($a);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/listaAttrazioni');
    }

    // -------- EVENTI --------
    public function listaEventi(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $eventi = FPersistentManager::get()->findAll(EEvento::class);
        $view = new VAdminContenuti();
        $view->mostraListaEventi($eventi);
    }

    public function aggiungiEvento(): void {
        USession::start();
        $view = new VAdminContenuti();
        $view->mostraFormEvento(); // form vuoto
    }

    public function salvaEvento(): void {
        USession::start();
        $e = new EEvento();
        $e->setImmagine($_POST['immagine']);
        $e->setTitolo($_POST['titolo']);
        $e->setDataInizio(new DateTime($_POST['dataInizio']));
        $e->setDataFine(new DateTime($_POST['dataFine']));

        FPersistentManager::store($e);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/listaEventi');
    }

    public function modificaEvento($id): void {
        USession::start();
        $e = FPersistentManager::get()->find(EEvento::class, $id);
        $view = new VAdminContenuti();
        $view->mostraFormEvento($e);
    }

    public function salvaModificaEvento(): void {
        USession::start();
        $e = FPersistentManager::get()->find(EEvento::class, $_POST['id']);
        $e->setImmagine($_POST['immagine']);
        $e->setTitolo($_POST['titolo']);
        $e->setDataInizio(new DateTime($_POST['dataInizio']));
        $e->setDataFine(new DateTime($_POST['dataFine']));

        FPersistentManager::store($e);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/listaEventi');
    }

    public function eliminaEvento($id): void {
        USession::start();
        $e = FPersistentManager::get()->find(EEvento::class, $id);
        if ($e) FPersistentManager::delete($e);
        header('Location: /Casette_Dei_Desideri/AdminContenuti/listaEventi');
    }
}
