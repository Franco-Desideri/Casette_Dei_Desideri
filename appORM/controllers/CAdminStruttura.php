<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FIntervallo;
use App\views\VAdminStruttura;
use App\models\EStruttura;
use App\models\EIntervallo;
use App\models\EFoto;

class CAdminStruttura
{

    /*Mostra la Lista delle strutture*/
    public function lista(): void
    {
        $strutture = FStruttura::getTutteStrutture();

        // → Inserisci qui il codice per popolare immaginePrincipale
        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $view = new VAdminStruttura();
        $view->mostraLista($strutture);
    }



    /*Metodo per Aggiungere una Struttura*/
    public function aggiungi(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminStruttura();
        $view->mostraForm();
    }

    /*Metodo per salvare una nuova struttura con controllo di errori*/
    public function salvaNuova(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "<script>alert('Accesso riservato.'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/lista';</script>";
            exit;
        }

        $dati = $_POST;
        $struttura = new EStruttura();
        $this->popolaStrutturaDaDati($struttura, $dati);

        $intervalliTemporanei = [];

        // Creazione e validazione intervalli (senza associarli ancora alla struttura)
        if (isset($dati['intervallo_inizio'], $dati['intervallo_fine'], $dati['intervallo_prezzo'])) {
            foreach ($dati['intervallo_inizio'] as $i => $inizioStr) {
                $fineStr = $dati['intervallo_fine'][$i];
                $prezzoStr = $dati['intervallo_prezzo'][$i];

                if ($inizioStr && $fineStr && is_numeric($prezzoStr)) {
                    $intervallo = new EIntervallo();
                    $intervallo->setDataI(new DateTime($inizioStr));
                    $intervallo->setDataF(new DateTime($fineStr));
                    $intervallo->setPrezzo((float)$prezzoStr);

                    // Validazione base (senza struttura)
                    $esito = FIntervallo::validaSingoloIntervallo($intervallo);
                    if ($esito !== true) {
                        echo "<script>alert('Errore intervallo ($inizioStr - $fineStr): $esito'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/aggiungi';</script>";
                        exit;
                    }

                    $intervalliTemporanei[] = $intervallo;
                }
            }

            // Verifica sovrapposizioni tra intervalli temporanei
            $esito = FIntervallo::verificaSovrapposizioni($intervalliTemporanei);
            if ($esito !== true) {
                echo "<script>alert('Errore: $esito'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/aggiungi';</script>";
                exit;
            }
        }

        // Tutto valido: procedi con il salvataggio
        $this->gestisciUploadFoto($struttura);
        FStruttura::salvaStruttura($struttura);

        foreach ($intervalliTemporanei as $intervallo) {
            $intervallo->setStruttura($struttura);
            $struttura->addIntervallo($intervallo);
            FIntervallo::creaIntervallo($intervallo);
        }

        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }




    /*Metodo per modificare una struttura esistente*/
    public function modifica($id): void {
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




    /*Metodo per modificare una struttura esistente con verifica di eventuali errori*/
    public function salvaModificata(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "<script>alert('Accesso riservato.'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/lista';</script>";
            exit;
        }

        $dati = $_POST;
        $struttura = FPersistentManager::get()->find(EStruttura::class, $dati['id']);
        if (!$struttura) {
            echo "<script>alert('Struttura non trovata.'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/lista';</script>";
            exit;
        }

        $this->popolaStrutturaDaDati($struttura, $dati);
        $idsForm = $dati['intervallo_id'] ?? [];

        $intervalliFinali = []; // array temporaneo per validazione collettiva
        $mappaEsistenti = [];

        // Mappa intervalli esistenti per ID
        foreach ($struttura->getIntervalli() as $esistente) {
            $mappaEsistenti[$esistente->getId()] = $esistente;
        }

        // Rimuove intervalli non presenti nel form
        foreach ($mappaEsistenti as $id => $int) {
            if (!in_array($id, $idsForm)) {
                $struttura->removeIntervallo($int);
                FPersistentManager::get()->remove($int);
                unset($mappaEsistenti[$id]);
            }
        }

        // Ricostruisce la lista completa di intervalli da salvare
        foreach ($dati['intervallo_inizio'] as $i => $inizioStr) {
            $fineStr = $dati['intervallo_fine'][$i];
            $prezzoStr = $dati['intervallo_prezzo'][$i];
            $idIntervallo = $idsForm[$i] ?? null;

            if ($inizioStr && $fineStr && is_numeric($prezzoStr)) {
                $inizio = new DateTime($inizioStr);
                $fine = new DateTime($fineStr);
                $prezzo = (float)$prezzoStr;

                if ($idIntervallo && isset($mappaEsistenti[$idIntervallo])) {
                    $intervallo = $mappaEsistenti[$idIntervallo];
                    $intervallo->setDataI($inizio);
                    $intervallo->setDataF($fine);
                    $intervallo->setPrezzo($prezzo);
                } else {
                    $intervallo = new EIntervallo();
                    $intervallo->setDataI($inizio);
                    $intervallo->setDataF($fine);
                    $intervallo->setPrezzo($prezzo);
                }

                $intervalliFinali[] = $intervallo;
            }
        }

        // Validazione collettiva
        foreach ($intervalliFinali as $intervallo) {
            $esito = FIntervallo::validaSingoloIntervallo($intervallo);
            if ($esito !== true) {
                echo "<script>alert('Errore intervallo: $esito'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/modifica/" . $struttura->getId() . "';</script>";
                exit;
            }
        }

        $esitoSovrapposizione = FIntervallo::verificaSovrapposizioni($intervalliFinali);
        if ($esitoSovrapposizione !== true) {
            echo "<script>alert('Errore: $esitoSovrapposizione'); window.location.href = '/Casette_Dei_Desideri/AdminStruttura/modifica/" . $struttura->getId() . "';</script>";
            exit;
        }

        // Aggiunta e salvataggio finale
        foreach ($intervalliFinali as $intervallo) {
            $intervallo->setStruttura($struttura);

            // evita duplicati solo se non ha ID o non è già nella collezione
            if (!isset($intervallo->id) || !$struttura->getIntervalli()->contains($intervallo)) {
                $struttura->addIntervallo($intervallo);
            }

            FPersistentManager::store($intervallo);
        }



        $this->gestisciUploadFoto($struttura);

        // Rimozione foto
        if (!empty($_POST['delete_foto_id'])) {
            $pm = FPersistentManager::get();
            foreach ($_POST['delete_foto_id'] as $fotoId) {
                $foto = $pm->find(EFoto::class, $fotoId);
                if ($foto) {
                    $struttura->removeFoto($foto);
                    $pm->remove($foto);
                }
            }
        }

        FStruttura::salvaStruttura($struttura);
        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }






    /*Metodo per eliminare una struttura esistente*/
    public function elimina($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $struttura = FPersistentManager::get()->find(EStruttura::class, $id);
        if ($struttura) {
            FStruttura::rimuoviStruttura($struttura);
        }

        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }



    /*Metodo privato per popolare una struttura*/
    private function popolaStrutturaDaDati(EStruttura $struttura, array $dati): void {
        $struttura->setTitolo($dati['titolo']);
        $struttura->setDescrizione($dati['descrizione']);
        $struttura->setM2((float)$dati['m2']);
        $struttura->setNumOspiti((int)$dati['numOspiti']);
        $struttura->setLuogo($dati['luogo']);
        $struttura->setNBagni((int)$dati['nBagni']);
        $struttura->setNLetti((int)$dati['nLetti']);
    $struttura->setColazione($dati['colazione'] == "1");
    $struttura->setAnimali($dati['animali'] == "1");
    $struttura->setParcheggio($dati['parcheggio'] == "1");
    $struttura->setWifi($dati['wifi'] == "1");
    $struttura->setBalcone($dati['balcone'] == "1");

    }


    /*Metodo privato per gestire l'upload delle foto*/
    private function gestisciUploadFoto(EStruttura $struttura): void {
        if (isset($_FILES['foto']['tmp_name']) && is_array($_FILES['foto']['tmp_name'])) {
            foreach ($_FILES['foto']['tmp_name'] as $tmpPath) {
                if (is_uploaded_file($tmpPath)) {
                    $blob = file_get_contents($tmpPath);
                    $foto = new EFoto();
                    $foto->setImmagine($blob);
                    $struttura->addFoto($foto);
                }
            }
        }
    }

}
