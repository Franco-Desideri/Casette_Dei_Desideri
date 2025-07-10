<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\views\VAdmin;
use App\models\EUtente;
use App\models\EPrenotazione;

class CAdmin
{
    public function profilo(): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        // Usa class::class con namespace corretti
        $admin = FPersistentManager::get()->find(EUtente::class, USession::get('utente_id'));
        $prenotazioni = FPersistentManager::get()->getRepository(EPrenotazione::class)->findAll();

        $view = new VAdmin();
        $view->mostraProfilo($admin, $prenotazioni);
    }

    public function riepilogo(int $id): void
    {
        USession::start();

        if (USession::get('ruolo') !== 'admin') {
            echo "Accesso riservato.";
            return;
        }

        $prenotazione = FPersistentManager::find(EPrenotazione::class, $id);

        $struttura = $prenotazione->getStruttura();
        $periodo = $prenotazione->getPeriodo();
        $ospiti = $prenotazione->getOspitiDettagli();
        $totale = $prenotazione->getPrezzo();

        $struttura->base64img = $struttura->getImmaginePrincipaleBase64();

        // Converti gli ospiti in array compatibili con Smarty
        $ospitiArray = [];

        foreach ($ospiti as $ospite) {
            $documento = $ospite->getDocumento();
            $docContent = null;

            if ($documento) {
                $docContent = is_resource($documento)
                    ? stream_get_contents($documento)
                    : $documento;
            }

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

        $view = new VAdmin();
        $view->mostraRiepilogoPrenotazione(
            $prenotazione,
            $struttura,
            $periodo,
            $ospitiArray, // array associativi per compatibilità Smarty
            $totale,
            $ruolo
        );
    }

}
