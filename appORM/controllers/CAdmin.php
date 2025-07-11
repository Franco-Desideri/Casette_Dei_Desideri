<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdmin;
use App\models\EUtente;
use App\models\EPrenotazione;

class CAdmin
{
    /**
     * Mostra il profilo dell'amministratore.
     * 
     * - Verifica che l'utente sia loggato come admin.
     * - Recupera i dati dell'utente corrente e tutte le prenotazioni dal database.
     * - Invia i dati alla vista VAdmin per la visualizzazione del profilo.
     */
    public function profilo(): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        // Recupera l'oggetto utente corrispondente all'ID salvato in sessione
        $admin = FPersistentManager::find(EUtente::class, USession::get('utente_id'));

        // Recupera tutte le prenotazioni presenti nel sistema
        $prenotazioni = FPersistentManager::findAll(EPrenotazione::class);


        // Passa i dati alla vista per la presentazione
        $view = new VAdmin();
        $view->mostraProfilo($admin, $prenotazioni);
    }

    /**
     * Mostra il riepilogo dettagliato di una prenotazione specifica.
     * 
     * - Verifica che l'utente sia un admin.
     * - Recupera la prenotazione tramite ID.
     * - Estrae struttura, periodo, ospiti e prezzo.
     * - Converte i dati ospiti in un array compatibile con Smarty (template engine).
     * - Passa tutte le informazioni alla vista per il rendering del riepilogo.
     * 
     * @param int $id ID della prenotazione da visualizzare
     */
    public function riepilogo(int $id): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        // Recupera l'oggetto prenotazione con ID specifico
        $prenotazione = FPersistentManager::find(EPrenotazione::class, $id);

        // Estrae le entità correlate
        $struttura = $prenotazione->getStruttura();
        $periodo = $prenotazione->getPeriodo();
        $ospiti = $prenotazione->getOspitiDettagli();
        $totale = $prenotazione->getPrezzo();

        // Prepara l'immagine principale della struttura in formato base64
        $struttura->base64img = $struttura->getImmaginePrincipaleBase64();

        // Converte ogni oggetto Ospite in un array associativo compatibile con Smarty
        $ospitiArray = [];

        foreach ($ospiti as $ospite) {
            $documento = $ospite->getDocumento();
            $docContent = null;

            // Estrae il contenuto del documento se è una risorsa (es. stream binario)
            if ($documento) {
                $docContent = is_resource($documento)
                    ? stream_get_contents($documento)
                    : $documento;
            }

            // Mappa dettagli dell’ospite e il documento (se presente) in formato base64
            $ospitiArray[] = [
                'nome' => $ospite->getNome(),
                'cognome' => $ospite->getCognome(),
                'tell' => $ospite->getTell(),
                'codiceFiscale' => $ospite->getCodiceF(),
                'sesso' => $ospite->getSesso(),
                'dataNascita' => $ospite->getDataN()->format('d/m/Y'),
                'luogoNascita' => $ospite->getLuogoN(),
                'documento_base64' => $docContent ? base64_encode($docContent) : null,
                'documento_mime' => $ospite->getDocumentoMime(),
                'documento_ext' => $ospite->getDocumentoExt()
            ];
        }

        $ruolo = USession::get('ruolo');

        // Passa tutti i dati raccolti alla vista per il rendering del riepilogo
        $view = new VAdmin();
        $view->mostraRiepilogoPrenotazione(
            $prenotazione,
            $struttura,
            $periodo,
            $ospitiArray,
            $totale,
            $ruolo
        );
    }
}
