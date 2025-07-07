<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdminStruttura;
use App\models\EStruttura;
use App\models\EIntervallo;
use App\models\EFoto;

class CAdminStruttura
{
    public function lista(): void
    {
        $strutture = FPersistentManager::get()
            ->getRepository(EStruttura::class)
            ->findAll();

        // → Inserisci qui il codice per popolare immaginePrincipale
        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $view = new VAdminStruttura();
        $view->mostraLista($strutture);
    }


    public function aggiungi(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminStruttura();
        $view->mostraForm();
    }

    public function salvaNuova(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $dati = $_POST;
        $struttura = new EStruttura();
        $this->popolaStrutturaDaDati($struttura, $dati);

        // Intervalli
        if (isset($dati['intervallo_inizio'], $dati['intervallo_fine'], $dati['intervallo_prezzo'])) {
            foreach ($dati['intervallo_inizio'] as $i => $inizioStr) {
                $fineStr = $dati['intervallo_fine'][$i];
                $prezzoStr = $dati['intervallo_prezzo'][$i];
                if ($inizioStr && $fineStr && is_numeric($prezzoStr)) {
                    $intervallo = new EIntervallo();
                    $intervallo->setDataI(new DateTime($inizioStr));
                    $intervallo->setDataF(new DateTime($fineStr));
                    $intervallo->setPrezzo((float)$prezzoStr);
                    $struttura->addIntervallo($intervallo);
                }
            }
        }

        $this->gestisciUploadFoto($struttura);

        FPersistentManager::store($struttura);
        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }

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

public function salvaModificata(): void {
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

    $this->popolaStrutturaDaDati($struttura, $dati);

    $idsForm = $dati['intervallo_id'] ?? [];

    if (isset($dati['intervallo_inizio'], $dati['intervallo_fine'], $dati['intervallo_prezzo'])) {

        // 1. Rimuovi gli intervalli presenti nella struttura ma non inviati dal form
        foreach ($struttura->getIntervalli() as $intervalloEsistente) {
            if (!in_array($intervalloEsistente->getId(), $idsForm)) {
                $struttura->removeIntervallo($intervalloEsistente);
                FPersistentManager::get()->remove($intervalloEsistente);
            }
        }

        // 2. Aggiungi nuovi intervalli o aggiorna quelli esistenti
        foreach ($dati['intervallo_inizio'] as $i => $inizioStr) {
            $fineStr = $dati['intervallo_fine'][$i];
            $prezzoStr = $dati['intervallo_prezzo'][$i];
            $idIntervallo = $idsForm[$i] ?? null;

            if ($inizioStr && $fineStr && is_numeric($prezzoStr)) {
                $inizio = new DateTime($inizioStr);
                $fine = new DateTime($fineStr);

                if ($idIntervallo) {
                    // Aggiorna intervallo esistente
                    $intervallo = FPersistentManager::get()->find(EIntervallo::class, $idIntervallo);
                    if ($intervallo) {
                        $intervallo->setDataI($inizio);
                        $intervallo->setDataF($fine);
                        $intervallo->setPrezzo((float)$prezzoStr);
                    }
                } else {
                    // Nuovo intervallo → controlla che non sia sovrapposto
                    $sovrapposto = false;
                    foreach ($struttura->getIntervalli() as $esistente) {
                        if (
                            ($inizio <= $esistente->getDataF()) &&
                            ($fine >= $esistente->getDataI())
                        ) {
                            $sovrapposto = true;
                            break;
                        }
                    }

                    if (!$sovrapposto) {
                        $intervallo = new EIntervallo();
                        $intervallo->setDataI($inizio);
                        $intervallo->setDataF($fine);
                        $intervallo->setPrezzo((float)$prezzoStr);
                        $struttura->addIntervallo($intervallo);
                        FPersistentManager::get()->persist($intervallo);
                    }
                }
            }
        }
    }

    $this->gestisciUploadFoto($struttura);
    
    //Rimozione foto
    if (!empty($_POST['delete_foto_id'])) {
        $pm = FPersistentManager::get();
        foreach ($_POST['delete_foto_id'] as $fotoId) {
            // recupera l'entità EFoto
            $foto = $pm->find(EFoto::class, $fotoId);
            if ($foto) {
                // dissocia la foto dalla struttura
                $struttura->removeFoto($foto);
                // elimina l'entità dal DB
                $pm->remove($foto);
            }
        }
    }


    FPersistentManager::store($struttura);
    header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
}


    public function elimina($id): void {
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
