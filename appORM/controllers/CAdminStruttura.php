<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\utility\UHTTPMethods;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FIntervallo;
use App\services\TechnicalServiceLayer\foundation\FStruttura;
use App\views\VAdminStruttura;
use App\models\EStruttura;
use App\models\EIntervallo;
use App\models\EFoto;

class CAdminStruttura
{
    /**
     * Mostra la lista di tutte le strutture registrate.
     * Per ciascuna struttura carica anche l'immagine principale in formato base64.
     */
    public function lista(): void
    {
        $strutture = FStruttura::getTutteStrutture();

        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $view = new VAdminStruttura();
        $view->mostraLista($strutture);
    }

    /**
     * Mostra il form per aggiungere una nuova struttura.
     * Accesso riservato agli admin.
     */
    public function aggiungi(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $view = new VAdminStruttura();
        $view->mostraForm();
    }

    /**
     * Salva una nuova struttura nel sistema, validando:
     * - Dati base della struttura
     * - Intervalli di disponibilità/prezzo
     * - Caricamento immagini
     */
    public function salvaNuova(): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            $this->alertAndRedirect('Accesso riservato.', '/Casette_Dei_Desideri/AdminStruttura/lista');
        }
    
        if (!UHTTPMethods::isPost()) {
            header('HTTP/1.1 405 Method Not Allowed');
            exit;
        }

        $dati = $_POST;
        $struttura = new EStruttura();
        $this->popolaStrutturaDaDati($struttura, $dati);

        $intervalliTemporanei = [];

        // Validazione di intervalli (inizio, fine, prezzo)
        if (isset($dati['intervallo_inizio'], $dati['intervallo_fine'], $dati['intervallo_prezzo'])) {
            foreach ($dati['intervallo_inizio'] as $i => $inizioStr) {
                $fineStr = $dati['intervallo_fine'][$i];
                $prezzoStr = $dati['intervallo_prezzo'][$i];

                if ($inizioStr && $fineStr && is_numeric($prezzoStr)) {
                    $intervallo = new EIntervallo();
                    $intervallo->setDataI(new DateTime($inizioStr));
                    $intervallo->setDataF(new DateTime($fineStr));
                    $intervallo->setPrezzo((float)$prezzoStr);

                    $esito = FIntervallo::validaSingoloIntervallo($intervallo);
                    if ($esito !== true) {
                        $this->alertAndRedirect("Errore intervallo ($inizioStr - $fineStr): $esito", '/Casette_Dei_Desideri/AdminStruttura/aggiungi');
                    }

                    $intervalliTemporanei[] = $intervallo;
                }
            }

            // Verifica che gli intervalli non si sovrappongano tra loro
            $esito = FIntervallo::verificaSovrapposizioni($intervalliTemporanei);
            if ($esito !== true) {
                $this->alertAndRedirect("Errore: $esito", '/Casette_Dei_Desideri/AdminStruttura/aggiungi');
            }
        }

        // Se tutto è valido, salva struttura e intervalli
        $this->gestisciUploadFoto($struttura);
        FStruttura::salvaStruttura($struttura);

        foreach ($intervalliTemporanei as $intervallo) {
            $intervallo->setStruttura($struttura);
            $struttura->addIntervallo($intervallo);
            FIntervallo::creaIntervallo($intervallo);
        }

        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }

    /**
     * Mostra il form per modificare una struttura esistente.
     */
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

    /**
     * Salva le modifiche a una struttura, con gestione completa di:
     * - Aggiornamento intervalli esistenti
     * - Rimozione intervalli eliminati dal form
     * - Validazione logica dei dati e intervalli
     * - Upload o rimozione foto
     */
    public function salvaModificata(): void {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            $this->alertAndRedirect("Accesso riservato.", "/Casette_Dei_Desideri/AdminStruttura/lista");
        }
     
        if (!UHTTPMethods::isPost()) {
            header('HTTP/1.1 405 Method Not Allowed');
            exit;
        }

        $dati = $_POST;
        $struttura = FStruttura::getStrutturaById($dati['id']);
        if (!$struttura) {
            $this->alertAndRedirect("Struttura non trovata.", "/Casette_Dei_Desideri/AdminStruttura/lista");
        }

        $this->popolaStrutturaDaDati($struttura, $dati);
        $idsForm = $dati['intervallo_id'] ?? [];

        // Mappatura intervalli già presenti
        $mappaEsistenti = [];
        foreach ($struttura->getIntervalli() as $esistente) {
            $mappaEsistenti[$esistente->getId()] = $esistente;
        }

        // Rimuove gli intervalli cancellati nel form
        foreach ($mappaEsistenti as $id => $int) {
            if (!in_array($id, $idsForm)) {
                $struttura->removeIntervallo($int);
                FIntervallo::eliminaIntervallo($int);
                unset($mappaEsistenti[$id]);
            }
        }

        // Aggiorna intervalli esistenti o crea nuovi
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
                }

                if (!isset($idIntervallo) || !$struttura->getIntervalli()->contains($intervallo)) {
                    $struttura->addIntervallo($intervallo);
                }
            }
        }

        // Gestione nuove immagini
        $this->gestisciUploadFoto($struttura);

        // Rimozione immagini selezionate
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

    /**
     * "Elimina" una struttura marcandola come cancellata (soft delete).
     */
    public function elimina($id): void {
        USession::start();
        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $struttura = FStruttura::getStrutturaById($id);
        if ($struttura) {
            FStruttura::rimuoviStruttura($struttura); // → imposta cancellata = true
        }

        header('Location: /Casette_Dei_Desideri/AdminStruttura/lista');
    }

    /**
     * Popola i dati della struttura a partire da $_POST.
     */
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

    /**
     * Gestisce il caricamento di una o più foto della struttura da $_FILES.
     */
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

    /**
     * Mostra un messaggio `alert` in JavaScript e reindirizza a una URL.
     */
    private function alertAndRedirect(string $msg, string $url): void {
        $safeMsg = addslashes($msg); // Escape per virgolette/apostrofi
        echo <<<HTML
    <script>
        alert('$safeMsg');
        window.location.href = '$url';
    </script>
    HTML;
        exit;
    }
}
