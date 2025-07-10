<?php

namespace App\views;

use Smarty\Smarty;
use App\install\StartSmarty;
use App\models\EStruttura;

class VPrenotazione
{
    private Smarty $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::start();
    }

    /**
     * Mostra il riepilogo iniziale con dati base
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
     * Mostra il form per l’inserimento degli ospiti (dopo riepilogo parziale)
     */
    public function mostraFormOspiti(EStruttura $struttura): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->display('utente/inserimento_dati_prenotazione.tpl');
    }

    /**
     * Mostra il riepilogo completo con ospiti e prezzo totale
     */
    public function mostraRiepilogoCompleto(EStruttura $struttura, string $dataInizio, string $dataFine, array $ospiti, float $totale): void
    {
        $this->smarty->assign('struttura', $struttura);
        $this->smarty->assign('dataInizio', $dataInizio);
        $this->smarty->assign('dataFine', $dataFine);
        foreach ($ospiti as &$ospite) {
            if (isset($ospite['documento']) && is_string($ospite['documento']) || is_resource($ospite['documento'])) {
                $ospite['documento_base64'] = base64_encode(
                    is_resource($ospite['documento'])
                        ? stream_get_contents($ospite['documento'])
                        : $ospite['documento']
                );
            }
        }
        $this->smarty->assign('ospiti', $ospiti);
        $this->smarty->assign('totale', $totale);
        $this->smarty->display('utente/riepilogo_prenotazione.tpl');
    }

    /**
     * Mostra la schermata di pagamento
     */
    public function mostraPagamento(): void
    {
        $this->smarty->display('utente/pagamento_prenotazione.tpl');
    }

    /**
     * Mostra un messaggio di conferma ordine inviato
     */
    public function confermaPrenotazione(): void
    {
        $this->smarty->display('libs/Smarty/templates/utente/conferma_prenotazione.tpl');
    }
}
