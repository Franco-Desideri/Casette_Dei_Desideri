<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\utility\UHTTPMethods;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminProdotto;
use App\models\EProdottoQuantita;
use App\models\EProdottoPeso;

class CAdminProdotto
{
    /**
     * Mostra la lista di tutti i prodotti visibili e non visibili.
     * - Recupera separatamente prodotti a quantità e a peso, distinguendo quelli attivi/nascosti.
     * - Passa tutto alla vista per il rendering dell'elenco completo.
     */
    public function lista(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        // Prodotti visibili
        $prodottiQ_visibili = FPersistentManager::findBy(EProdottoQuantita::class, ['visibile' => true]);
        $prodottiP_visibili = FPersistentManager::findBy(EProdottoPeso::class, ['visibile' => true]);

        // Prodotti nascosti
        $prodottiQ_nascosti = FPersistentManager::findBy(EProdottoQuantita::class, ['visibile' => false]);
        $prodottiP_nascosti = FPersistentManager::findBy(EProdottoPeso::class, ['visibile' => false]);


        $view = new VAdminProdotto();
        $view->mostraLista($prodottiQ_visibili, $prodottiP_visibili, $prodottiQ_nascosti, $prodottiP_nascosti);
    }

    /**
     * Mostra il form per inserire un nuovo prodotto a quantità.
     */
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

    /**
     * Mostra il form per inserire un nuovo prodotto a peso.
     */
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

    /**
     * Salva un nuovo prodotto (a quantità o a peso) nel database.
     * - Determina il tipo di prodotto da salvare tramite `$_POST['tipo']`.
     * - Imposta i relativi campi e gestisce l'immagine caricata.
     */
    public function salva(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        if (!UHTTPMethods::isPost()) {
            header('HTTP/1.1 405 Method Not Allowed');
            exit;
        }

        $tipo = $_POST['tipo'];
        $prodotto = null;

        if ($tipo === 'quantita') {
            $prodotto = new EProdottoQuantita();
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzo((float)$_POST['prezzo']);
            $prodotto->setPeso((int)$_POST['peso']);
            $prodotto->setUnitaMisura($_POST['unita_misura']);
        } elseif ($tipo === 'peso') {
            $prodotto = new EProdottoPeso();
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzoKg((float)$_POST['prezzoKg']);
            $prodotto->setRangePeso($_POST['rangePeso']);
        }

        // Gestione immagine come BLOB
        if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $fileTmp = $_FILES['foto']['tmp_name'];
            $fileData = file_get_contents($fileTmp);
            $prodotto->setFoto($fileData); // Richiede una colonna BLOB nella tabella
        }

        if ($prodotto) {
            FPersistentManager::store($prodotto);
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    }

    public function modificaQuantita($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::find(EProdottoQuantita::class, $id);

        if (!$prodotto) {
            echo "Prodotto non trovato.";
            return;
        }

        $view = new VAdminProdotto();
        $view->mostraForm($prodotto); // Form precompilato
    }

    public function modificaPeso($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::find(EProdottoPeso::class, $id);

        if (!$prodotto) {
            echo "Prodotto non trovato.";
            return;
        }

        $view = new VAdminProdotto();
        $view->mostraForm($prodotto); // Form precompilato
    }



    /**
     * Salva le modifiche effettuate a un prodotto esistente.
     * - Aggiorna i campi in base al tipo (quantità o peso).
     * - Sostituisce l'immagine se presente.
     */
    public function salvaModifica(): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        if (!UHTTPMethods::isPost()) {
            header('HTTP/1.1 405 Method Not Allowed');
            exit;
        }

        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $prodotto = null;

        if ($tipo === 'quantita') {
            $prodotto = FPersistentManager::find(EProdottoQuantita::class, $id);
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzo((float)$_POST['prezzo']);
            $prodotto->setPeso((int)$_POST['peso']);
        } elseif ($tipo === 'peso') {
            $prodotto = FPersistentManager::find(EProdottoPeso::class, $id);
            $prodotto->setNome($_POST['nome']);
            $prodotto->setPrezzoKg((float)$_POST['prezzoKg']);
            $prodotto->setRangePeso($_POST['rangePeso']);
        }

        // Aggiornamento immagine se presente
        if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $fileTmp = $_FILES['foto']['tmp_name'];
            $fileData = file_get_contents($fileTmp);
            $prodotto->setFoto($fileData);
        }

        FPersistentManager::store($prodotto);
        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    }

    /**
     * Disattiva (nasconde) un prodotto impostandolo come non visibile.
     * Riconosce il tipo (quantità o peso) e aggiorna la visibilità nel DB.
     */
    public function disattivaQuantita($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::find(EProdottoQuantita::class, $id);

        if ($prodotto) {
            $prodotto->setVisibile(false);
            FPersistentManager::get()->flush();
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
        exit;
    }


    public function disattivaPeso($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::find(EProdottoPeso::class, $id);

        if ($prodotto) {
            $prodotto->setVisibile(false);
            FPersistentManager::get()->flush();
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
        exit;
    }



    /**
     * Riattiva (rende visibile) un prodotto precedentemente disattivato.
     */
    public function attivaQuantita($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::find(EProdottoQuantita::class, $id);

        if ($prodotto) {
            $prodotto->setVisibile(true);
            FPersistentManager::get()->persist($prodotto);
            FPersistentManager::get()->flush();
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
        exit;
    }

    public function attivaPeso($id): void
    {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prodotto = FPersistentManager::find(EProdottoPeso::class, $id);

        if ($prodotto) {
            $prodotto->setVisibile(true);
            FPersistentManager::get()->persist($prodotto);
            FPersistentManager::get()->flush();
        }

        header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
        exit;
    }


}
