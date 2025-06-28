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

        // Intervalli non sovrapposti
        if (isset($dati['intervallo_inizio'], $dati['intervallo_fine'], $dati['intervallo_prezzo'])) {
            foreach ($dati['intervallo_inizio'] as $i => $inizioStr) {
                $fineStr = $dati['intervallo_fine'][$i];
                $prezzoStr = $dati['intervallo_prezzo'][$i];

                if ($inizioStr && $fineStr && is_numeric($prezzoStr)) {
                    $inizio = new DateTime($inizioStr);
                    $fine = new DateTime($fineStr);
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
                    }
                }
            }
        }

        $this->gestisciUploadFoto($struttura);

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
        $struttura->setColazione(isset($dati['colazione']));
        $struttura->setAnimali(isset($dati['animali']));
        $struttura->setParcheggio(isset($dati['parcheggio']));
        $struttura->setWifi(isset($dati['wifi']));
        $struttura->setBalcone(isset($dati['balcone']));
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
