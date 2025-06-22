<?php

class CAdminProdotto
{
    public function lista(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodottiQ = FPersistentManager::get()->findAll('EProdottoQuantita');
        $prodottiP = FPersistentManager::get()->findAll('EProdottoPeso');

        $view = new VAdminProdotto();
        $view->mostraLista($prodottiQ, $prodottiP);
    }

    public function aggiungi(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminProdotto();
        $view->mostraForm(); // Form vuoto per nuovo prodotto
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
            $prodotto->setFoto($_POST['foto']);
        } elseif ($tipo === 'peso') {
            $prodotto = new EProdottoPeso();
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzoKg((float)$_POST['prezzoKg']);
            $prodotto->setRangePeso($_POST['rangePeso']);
            $prodotto->setPrezzoRange((float)$_POST['prezzoRange']);
            $prodotto->setFoto($_POST['foto']);
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

        $prodotto = FPersistentManager::get()->find('EProdottoQuantita', $id)
                  ?? FPersistentManager::get()->find('EProdottoPeso', $id);

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
            $p = FPersistentManager::get()->find('EProdottoQuantita', $id);
            $p->setNome($_POST['nome']);
            $p->setPrezzo((float)$_POST['prezzo']);
            $p->setPeso((int)$_POST['peso']);
            $p->setFoto($_POST['foto']);
        } elseif ($tipo === 'peso') {
            $p = FPersistentManager::get()->find('EProdottoPeso', $id);
            $p->setNome($_POST['nome']);
            $p->setPrezzoKg((float)$_POST['prezzoKg']);
            $p->setRangePeso($_POST['rangePeso']);
            $p->setPrezzoRange((float)$_POST['prezzoRange']);
            $p->setFoto($_POST['foto']);
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

        $p = FPersistentManager::get()->find('EProdottoQuantita', $id)
           ?? FPersistentManager::get()->find('EProdottoPeso', $id);

        if ($p) {
            FPersistentManager::remove($p);
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    }
}
