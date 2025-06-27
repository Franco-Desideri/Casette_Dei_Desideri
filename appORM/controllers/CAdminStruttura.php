<?php


use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminStruttura;
use App\models\EStruttura;

class CAdminStruttura
{
    public function lista(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $strutture = FPersistentManager::get()->getRepository(EStruttura::class)->findAll();

        $view = new VAdminStruttura();
        $view->mostraLista($strutture);
    }

    public function aggiungi(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminStruttura();
        $view->mostraForm();
    }

    public function salvaNuova(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $dati = $_POST;

        $struttura = new EStruttura();
        $struttura->setTitolo($dati['titolo']);
        $struttura->setDescrizione($dati['descrizione']);
        $struttura->setM2((float)$dati['m2']);
        $struttura->setNumOspiti((int)$dati['numOspiti']);
        $struttura->setLuogo($dati['luogo']);
        $struttura->setNBagni((int)$dati['nBagni']);
        $struttura->setNLetti((int)$dati['nLetti']);
        $struttura->setColazione(isset($dati['colazione']));
        $struttura->setAnimali(isset($dati['animali']));
        $struttura->setParcheggio(isset($dati['parcheggio']));
        $struttura->setWifi(isset($dati['wifi']));
        $struttura->setBalcone(isset($dati['balcone']));

        FPersistentManager::store($struttura);
        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }

    public function modifica($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }
        
        $struttura = FPersistentManager::get()->find(EStruttura::class, $id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        $view = new VAdminStruttura();
        $view->mostraForm($struttura);
    }

    public function salvaModificata(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $dati = $_POST;
        $struttura = FPersistentManager::get()->find(EStruttura::class, $dati['id']);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        $struttura->setTitolo($dati['titolo']);
        $struttura->setDescrizione($dati['descrizione']);
        $struttura->setM2((float)$dati['m2']);
        $struttura->setNumOspiti((int)$dati['numOspiti']);
        $struttura->setLuogo($dati['luogo']);
        $struttura->setNBagni((int)$dati['nBagni']);
        $struttura->setNLetti((int)$dati['nLetti']);
        $struttura->setColazione(isset($dati['colazione']));
        $struttura->setAnimali(isset($dati['animali']));
        $struttura->setParcheggio(isset($dati['parcheggio']));
        $struttura->setWifi(isset($dati['wifi']));
        $struttura->setBalcone(isset($dati['balcone']));

        FPersistentManager::store($struttura);
        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }

    public function elimina($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $struttura = FPersistentManager::get()->find(EStruttura::class, $id);
        if ($struttura) {
            FPersistentManager::delete($struttura);

        }

        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }
}
