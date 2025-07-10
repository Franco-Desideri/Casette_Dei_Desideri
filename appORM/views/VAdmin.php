<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EUtente;
use App\models\EPrenotazione;

/**
 * Classe View per la gestione del pannello personale dell’amministratore.
 * Visualizza: profilo admin con tutte le prenotazioni, e dettaglio di una singola prenotazione.
 */
class VAdmin
{
    private Smarty $smarty;

    public function __construct()
    {
        // Avvio di Smarty tramite configurazione
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il profilo dell'amministratore e la lista completa delle prenotazioni ricevute
     *
     * @param EUtente $admin L'utente admin attualmente loggato
     * @param array $prenotazioni Elenco di tutte le prenotazioni registrate
     */
    public function mostraProfilo(EUtente $admin, array $prenotazioni): void
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('prenotazioni', $prenotazioni);
        $this->smarty->display('admin/profilo.tpl');
    }

    /*Mostra i dettagli di una singola prenotazione*/

    public function mostraRiepilogoPrenotazione($prenotazione, $struttura, $periodo, $ospiti, $totale, $ruolo): void
    {
        $this->smarty->assign('ruolo', $ruolo);
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $periodo->getDataI()->format('d/m/Y'));
        $this->smarty->assign('dataFine', $periodo->getDataF()->format('d/m/Y'));

        $ospitiArray = [];
        $finfo = new \finfo(FILEINFO_MIME_TYPE);

        foreach ($ospiti as $ospite) {
            $ospiteData = [
                'nome' => $ospite->getNome(),
                'cognome' => $ospite->getCognome(),
                'tell' => $ospite->getTell(),
                'codiceFiscale' => $ospite->getCodiceF(),
                'sesso' => $ospite->getSesso(),
                'dataNascita' => $ospite->getDataN()->format('d/m/Y'),
                'luogoNascita' => $ospite->getLuogoN()
            ];

            $documento = $ospite->getDocumento();

            if ($documento) {
                // Se è una risorsa, leggiamo il contenuto
                $docContent = is_resource($documento) ? stream_get_contents($documento) : $documento;

                // Ora possiamo usarlo con finfo
                $mimeType = $finfo->buffer($docContent);
                $base64 = base64_encode($docContent);
                $ext = explode('/', $mimeType)[1] ?? 'bin';

                $ospiteData['documento_base64'] = $base64;
                $ospiteData['documento_mime'] = $mimeType;
                $ospiteData['documento_ext'] = $ext;
            }

            $ospitiArray[] = $ospiteData;
        }

        $this->smarty->assign('ospiti', $ospitiArray);
        $this->smarty->assign('totale', $totale);

        $this->smarty->display('utente/prenotazione_riepilogo.tpl');
    }
}