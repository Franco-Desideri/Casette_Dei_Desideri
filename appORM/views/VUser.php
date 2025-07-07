<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EUtente;
use App\models\EPrenotazione;
use App\models\EEvento;
use App\models\EAttrazione;

/**
 * Classe View per la gestione della visualizzazione dell'utente
 * Responsabile di: login, profilo utente e visualizzazione prenotazioni personali
 */
class VUser
{
    private Smarty $smarty;

    public function __construct()
    {
        // Inizializzazione del motore Smarty tramite la configurazione centralizzata
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il form di login (senza errori)
     */
    public function mostraLogin(): void
    {
        $this->smarty->display('utente/login.tpl');
    }

    /**
     * Mostra il form di login con un messaggio di errore
     *
     * @param string $errore Messaggio di errore da mostrare all'utente
     */
    public function mostraLoginConErrore(string $errore): void
    {
        $this->smarty->assign('errore', $errore);
        $this->smarty->display('utente/login.tpl');
    }

    /**
     * Mostra la pagina del profilo dell'utente con lo storico delle prenotazioni
     *
     * @param EUtente $utente L'oggetto utente attualmente loggato
     */
    public function mostraProfilo(EUtente $utente): void
    {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('prenotazioni', $utente->getPrenotazioni());
        $this->smarty->display('utente/profilo.tpl');
    }

    /**
     * Mostra i dettagli di una specifica prenotazione dell'utente
     *
     * @param EPrenotazione $prenotazione La prenotazione selezionata
     */
    public function mostraPrenotazione(EPrenotazione $prenotazione): void
    {
        $this->smarty->assign('prenotazione', $prenotazione);
        $this->smarty->display('utente/prenotazione.tpl');
    }

    /**
     * Mostra la home page dell'utente con eventi e attrazioni
     *
     * @param array $eventi     Lista di oggetti EEvento
     * @param array $attrazioni Lista di oggetti EAttrazione
     */
    public function mostraHome(string $email,array $eventi, array $attrazioni): void
    {
        foreach ($eventi as $e) {
            if ($e->getImmagine()) {
                $e->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($e->getImmagine()));
            }
        }
        
        foreach ($attrazioni as $a) {
            if ($a->getImmagine()) {
                $a->base64img = 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($a->getImmagine()));
            }
        }
        $this->smarty->assign('attrazioni', $attrazioni);
        $this->smarty->assign('eventi', $eventi);
        $this->smarty->assign('email_admin', $email);
        $this->smarty->display('utente/home.tpl');
    }

    /**
     * Mostra il form di registrazione
     */
    public function mostraRegistrazione(): void
    {
        $this->smarty->display('utente/registrazione.tpl');
    }

    /**
     * Mostra il form di registrazione con errore
     */
    public function mostraRegistrazioneConErrore(string $errore): void
    {
        $this->smarty->assign('errore', $errore);
        $this->smarty->display('utente/registrazione.tpl');
    }

    public function mostraRiepilogoPrenotazione($prenotazione, $struttura, $periodo, $ospiti, $totale): void
    {
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
