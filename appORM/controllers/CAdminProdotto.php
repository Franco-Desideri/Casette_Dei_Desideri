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
        //Prodotti visibili
        $prodottiQ_visibili = FPersistentManager::get()->getRepository(EProdottoQuantita::class)->findBy(['visibile' => true]);
        $prodottiP_visibili = FPersistentManager::get()->getRepository(EProdottoPeso::class)->findBy(['visibile' => true]);

        //Prodotti nascosti
        $prodottiQ_nascosti = FPersistentManager::get()->getRepository(EProdottoQuantita::class)->findBy(['visibile' => false]);
        $prodottiP_nascosti = FPersistentManager::get()->getRepository(EProdottoPeso::class)->findBy(['visibile' => false]);


        $view = new VAdminProdotto();
        $view->mostraLista($prodottiQ_visibili, $prodottiP_visibili, $prodottiQ_nascosti, $prodottiP_nascosti);
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
        $prodotto->setUnitaMisura($_POST['unita_misura']);
    } elseif ($tipo === 'peso') {
        $prodotto = new EProdottoPeso();
        $prodotto->setNome($_POST['nome']);
        $prodotto->setPrezzoKg((float)$_POST['prezzoKg']);
        $prodotto->setRangePeso($_POST['rangePeso']);
        
    }

   // 📁 Salvataggio immagine come BLOB nel database
if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $fileTmp = $_FILES['foto']['tmp_name'];

    // Legge i dati binari del file
    $fileData = file_get_contents($fileTmp);

    // Imposta l'immagine come BLOB nell'entità
    $prodotto->setFoto($fileData); // Assicurati che EProdotto::foto sia una colonna BLOB
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
    } elseif ($tipo === 'peso') {
        $p = FPersistentManager::get()->find(EProdottoPeso::class, $id);
        $p->setNome($_POST['nome']);
        $p->setPrezzoKg((float)$_POST['prezzoKg']);
        $p->setRangePeso($_POST['rangePeso']);
    }

    // 📁 Salvataggio immagine come BLOB nel database
if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $fileTmp = $_FILES['foto']['tmp_name'];

    // Legge i dati binari del file
    $fileData = file_get_contents($fileTmp);

    // Imposta l'immagine come BLOB nell'entità
    $prodotto->setFoto($fileData); // Assicurati che EProdotto::foto sia una colonna BLOB
}


    FPersistentManager::store($p);
    header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
}


    public function disattiva(): void
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProdotto'])) {
        $id = (int)$_POST['idProdotto'];

        $pm = FPersistentManager::get();

        // Trova il prodotto (a quantità o a peso)
        $prodottoQ = $pm->getRepository(EProdottoQuantita::class)->find($id);
        $prodottoP = $pm->getRepository(EProdottoPeso::class)->find($id);
        $prodotto = $prodottoQ ?? $prodottoP;

        if ($prodotto !== null) {
            $prodotto->setVisibile(false);
            $pm->flush(); // salva i cambiamenti nel DB

            header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
            exit;
        }
    }

    // Fallback redirect
    header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    exit;
}

public function attiva($id): void
{
    $pm = FPersistentManager::get();

    $prodottoQ = $pm->find(EProdottoQuantita::class, $id); // o EProdottoPeso se è a peso
    $prodottoP = $pm->find(EProdottoPeso::class, $id);
    $prodotto = $prodottoQ ?? $prodottoP;
    if ($prodotto) {
        $prodotto->setVisibile(true); // oppure 1
        $pm->persist($prodotto);
        $pm->flush();
    }

    header('Location: /Casette_Dei_Desideri/AdminProdotto/lista');
    exit;
}



}
