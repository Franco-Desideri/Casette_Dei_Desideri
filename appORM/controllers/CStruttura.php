<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\services\TechnicalServiceLayer\foundation\FStruttura;
use App\views\VStruttura;
use App\models\EStruttura;

class CStruttura
{
    /**
     * Mostra la lista di tutte le strutture disponibili.
     * - Avvia la sessione
     * - Recupera tutte le strutture dal DB
     * - Codifica l’immagine principale in base64 per ciascuna struttura
     * - Passa i dati alla vista per il rendering
     */
    public function lista(): void
    {
        USession::start();

        $strutture = FStruttura::getTutteStrutture();

        // Per ogni struttura, genera l'immagine principale in formato base64 per l'output HTML
        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $view = new VStruttura();
        $view->mostraLista($strutture);
    }

    /**
     * Mostra i dettagli di una singola struttura.
     * - Precarica immagini, intervalli e prenotazioni
     * - Prepara ogni immagine in base64 per visualizzazione diretta
     * 
     * @param int $id ID della struttura da mostrare
     */
    public function dettaglio($id): void
    {
        USession::start();

        $struttura = FStruttura::getStrutturaById($id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        // Precarica collezioni per evitare LazyLoading dopo chiusura dell'EntityManager
        $foto = $struttura->getFoto()->toArray();

        foreach ($foto as $f) {
            if ($f->getImmagine()) {
                // Converte immagine binaria in stringa base64 visualizzabile in HTML
                $f->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($f->getImmagine()));
            }
        }

        $intervalli = $struttura->getIntervalli()->toArray();
        $prenotazioni = $struttura->getPrenotazioni()->toArray();

        $view = new VStruttura();
        $view->mostraDettaglio($struttura, $foto, $intervalli, $prenotazioni);
    }

    /**
     * Reindirizza un utente loggato al processo di prenotazione per la struttura selezionata.
     * - Verifica che l’utente sia autenticato
     * - Salva l'ID della struttura nella sessione
     * - Reindirizza al controller di prenotazione
     * 
     * @param int $id ID della struttura da prenotare
     */
    public function prenota($id): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $struttura = FStruttura::getStrutturaById($id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        // Salva struttura in sessione per usarla nel processo di prenotazione
        USession::set('struttura_prenotazione', $id);

        // Reindirizza al primo step della prenotazione
        header('Location: /Casette_Dei_Desideri/Prenotazione/dettagliOspiti/' . $id);
        exit;
    }
}
