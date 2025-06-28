<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminProdotto;
use App\models\EProdottoQuantita;
use App\models\EProdottoPeso;

class CAdminProdotto
{
    public function lista(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodottiQ = FPersistentManager::get()->getRepository(EProdottoQuantita::class)->findAll();
        $prodottiP = FPersistentManager::get()->getRepository(EProdottoPeso::class)->findAll();


        $view = new VAdminProdotto();
        $view->mostraLista($prodottiQ, $prodottiP);
    }

    public function aggiungiQuantita(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminProdotto();
        $view->mostraFormQuantita();
    }

    public function aggiungiPeso(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminProdotto();
        $view->mostraFormPeso();
    }


    public function salva(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $tipo = $_POST['tipo'];
        $prodotto = null;

        if ($tipo === 'quantita') {
            $prodotto = new EProdottoQuantita();
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzo((float)$_POST['prezzo']);
            $prodotto->setPeso((int)$_POST['peso']);
            if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $blob = file_get_contents($_FILES['foto']['tmp_name']);
            $prodotto->setFoto($blob);
        }
        } elseif ($tipo === 'peso') {
            $prodotto = new EProdottoPeso();
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzoKg((float)$_POST['prezzoKg']);
            $prodotto->setRangePeso($_POST['rangePeso']);
            $prodotto->setPrezzoRange((float)$_POST['prezzoRange']);
            if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $blob = file_get_contents($_FILES['foto']['tmp_name']);
            $prodotto->setFoto($blob);
        }
        }

        if ($prodotto) {
            FPersistentManager::store($prodotto);
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    }

    public function modifica($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::get()->find(EProdottoQuantita::class, $id)
                  ?? FPersistentManager::get()->find(EProdottoPeso::class, $id);

        if (!$prodotto) {
            echo "Prodotto non trovato.";
            return;
        }

        $view = new VAdminProdotto();
        $view->mostraForm($prodotto); // Form con dati precompilati
    }

    public function salvaModifica(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $id = $_POST['id'];
        $tipo = $_POST['tipo'];

        if ($tipo === 'quantita') {
            $p = FPersistentManager::get()->find(EProdottoQuantita::class, $id);
            $p->setNome($_POST['nome']);
            $p->setPrezzo((float)$_POST['prezzo']);
            $p->setPeso((int)$_POST['peso']);
            if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $blob = file_get_contents($_FILES['foto']['tmp_name']);
                $prodotto->setFoto($blob);
            }
        } elseif ($tipo === 'peso') {
            $p = FPersistentManager::get()->find('EProdottoPeso', $id);
            $p->setNome($_POST['nome']);
            $p->setPrezzoKg((float)$_POST['prezzoKg']);
            $p->setRangePeso($_POST['rangePeso']);
            $p->setPrezzoRange((float)$_POST['prezzoRange']);
            if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $blob = file_get_contents($_FILES['foto']['tmp_name']);
                $prodotto->setFoto($blob);
            }
        }

        FPersistentManager::store($p);
        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    }

    public function elimina($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $p = FPersistentManager::get()->find(EProdottoQuantita::class, $id)
           ?? FPersistentManager::get()->find(EProdottoPeso::class, $id);

        if ($p) {
            FPersistentManager::delete($p);
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    }
}
