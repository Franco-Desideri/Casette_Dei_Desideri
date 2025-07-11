<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;

/**
 * Classe View per la gestione del processo di prenotazione lato utente.
 * Responsabile di mostrare:
 * - Riepiloghi (parziali e completi)
 * - Form per l'inserimento ospiti
 * - Schermata pagamento e conferma
 */
class VPrenotazione
{
    /**
     * Istanza di Smarty per il rendering dei template.
     *
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * Costruttore: inizializza Smarty tramite configurazione centralizzata.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra un riepilogo parziale della prenotazione:
     * struttura selezionata, date, numero ospiti e totale stimato.
     *
     * @param EStruttura $struttura
     * @param string     $dataInizio
     * @param string     $dataFine
     * @param int        $numOspiti
     * @param float      $totale
     */
    public function mostraRiepilogoParziale(EStruttura $struttura, string $dataInizio, string $dataFine, int $numOspiti, float $totale): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $dataInizio);
        $this->smarty->assign('dataFine', $dataFine);
        $this->smarty->assign('numOspiti', $numOspiti);
        $this->smarty->assign('totale', $totale);
        $this->smarty->display('utente/prenotazione_riepilogo_parziale.tpl');
    }

    /**
     * Mostra il form per l'inserimento dei dati degli ospiti.
     *
     * @param EStruttura $struttura
     */
    public function mostraFormOspiti(EStruttura $struttura): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->display('utente/inserimento_dati_prenotazione.tpl');
    }

    /**
     * Mostra il riepilogo completo con dettagli degli ospiti e prezzo finale.
     * I documenti vengono convertiti in base64 per poter essere visualizzati nel template.
     *
     * @param EStruttura $struttura
     * @param string     $dataInizio
     * @param string     $dataFine
     * @param array      $ospiti        Array associativo contenente i dati degli ospiti
     * @param float      $totale
     */
    public function mostraRiepilogoCompleto(EStruttura $struttura, string $dataInizio, string $dataFine, array $ospiti, float $totale): void
    {
        // Encoding base64 dei documenti (se presenti)
        foreach ($ospiti as &$ospite) {
            if (isset($ospite['documento']) && (is_string($ospite['documento']) || is_resource($ospite['documento']))) {
                $ospite['documento_base64'] = base64_encode(
                    is_resource($ospite['documento'])
                        ? stream_get_contents($ospite['documento'])
                        : $ospite['documento']
                );
            }
        }

        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $dataInizio);
        $this->smarty->assign('dataFine', $dataFine);
        $this->smarty->assign('ospiti', $ospiti);
        $this->smarty->assign('totale', $totale);
        $this->smarty->display('utente/riepilogo_prenotazione.tpl');
    }

    /**
     * Mostra la pagina per effettuare il pagamento della prenotazione.
     */
    public function mostraPagamento(): void
    {
        $this->smarty->display('utente/pagamento_prenotazione.tpl');
    }

    /**
     * Mostra la conferma della prenotazione completata con successo.
     */
    public function confermaPrenotazione(): void
    {
        $this->smarty->display('libs/Smarty/templates/utente/conferma_prenotazione.tpl');
    }
}
