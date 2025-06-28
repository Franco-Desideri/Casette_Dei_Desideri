<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VStruttura;
use App\models\EStruttura;

class CStruttura
{
    public function lista(): void
    {
        USession::start();

        $strutture = FPersistentManager::get()->getRepository(EStruttura::class)->findAll();

        foreach ($strutture as $s) {
            $s->immaginePrincipale = $s->getImmaginePrincipaleBase64();
        }

        $view = new VStruttura();
        $view->mostraLista($strutture);
    }

    public function dettaglio($id): void
    {
        USession::start();

        $struttura = FPersistentManager::get()->find(EStruttura::class, $id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        // Precarichiamo le collezioni per evitare LazyLoading dopo EntityManager closure
        $foto = $struttura->getFoto()->toArray();
        foreach ($foto as $f) {
            if ($f->getImmagine()) {
                $f->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($f->getImmagine()));
            }
        }
        $intervalli = $struttura->getIntervalli()->toArray();
        $prenotazioni = $struttura->getPrenotazioni()->toArray();

        $view = new VStruttura();
        $view->mostraDettaglio($struttura, $foto, $intervalli, $prenotazioni);
    }

    public function prenota($id): void
    {
        USession::start();

        if (!USession::exists('utente_id')) {
            header('Location: /Casette_Dei_Desideri/User/login');
            exit;
        }

        $struttura = FPersistentManager::get()->find(EStruttura::class, $id);

        if (!$struttura) {
            echo "Struttura non trovata.";
            return;
        }

        USession::set('struttura_prenotazione', $id);
        header('Location: /Casette_Dei_Desideri/Prenotazione/dettagliOspiti/' . $id);
        exit;
    }
}
