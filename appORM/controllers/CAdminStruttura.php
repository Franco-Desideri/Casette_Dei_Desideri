<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FIntervallo;
use App\services\TechnicalServiceLayer\foundation\FStruttura;
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

        $struttura = FStruttura::getStrutturaById($id);
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
            $this->alertAndRedirect("Accesso riservato.", "/Casette_Dei_Desideri/AdminStruttura/lista");
            return;
        }

        $dati = $_POST;
        $struttura = FStruttura::getStrutturaById($dati['id']);

        if (!$struttura) {
            $this->alertAndRedirect("Struttura non trovata.", "/Casette_Dei_Desideri/AdminStruttura/lista");
            return;
        }

        $this->popolaStrutturaDaDati($struttura, $dati);
        $idsForm = $dati['intervallo_id'] ?? [];

        // Mappa intervalli esistenti per ID
        $mappaEsistenti = [];
        foreach ($struttura->getIntervalli() as $esistente) {
            $mappaEsistenti[$esistente->getId()] = $esistente;
        }

        // Rimuove intervalli non presenti nel form
        foreach ($mappaEsistenti as $id => $int) {
            if (!in_array($id, $idsForm)) {
                $struttura->removeIntervallo($int);
                FIntervallo::eliminaIntervallo($int);
                unset($mappaEsistenti[$id]);
            }
        }

        // Gestione intervalli aggiornati o nuovi
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
                    $esito = FIntervallo::modificaIntervallo($intervallo, $inizio, $fine, $prezzo);
                } else {
                    $intervallo = new EIntervallo();
                    $intervallo->setStruttura($struttura);
                    $intervallo->setDataI($inizio);
                    $intervallo->setDataF($fine);
                    $intervallo->setPrezzo($prezzo);
                    $esito = FIntervallo::creaIntervallo($intervallo);
                }

                if ($esito !== true) {
                    $id = $struttura->getId();
                    $this->alertAndRedirect("Errore intervallo: $esito", "/Casette_Dei_Desideri/AdminStruttura/modifica/$id");
                    return;
                }

                if (!isset($idIntervallo) || !$struttura->getIntervalli()->contains($intervallo)) {
                    $struttura->addIntervallo($intervallo);
                }
            }
        }

        // Gestione upload immagini
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







    /*Metodo per eliminare una strutura (in realtà viene impostato il valore cancellata come true)*/
    public function elimina($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $struttura = FStruttura::getStrutturaById($id);
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

    private function alertAndRedirect(string $msg, string $url): void {
        $safeMsg = addslashes($msg); // Escapa apostrofi, virgolette ecc.
        echo <<<HTML
    <script>
        alert('$safeMsg');
        window.location.href = '$url';
    </script>
    HTML;
        exit;
    }
}
