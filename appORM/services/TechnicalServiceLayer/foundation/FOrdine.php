<?php

namespace App\services\TechnicalServiceLayer\foundation;

class FOrdine
{
    /**
     * Salva un ordine (inclusi i suoi item)
     */
    public static function creaOrdine(EOrdine $ordine): void
    {
        FPersistentManager::store($ordine);
    }

    /**
     * Recupera tutti gli ordini effettuati da un utente
     */
    public static function getOrdiniPerUtente(int $utenteId): array
    {
        return FPersistentManager::findBy(EOrdine::class, ['utente' => $utenteId]);
    }

    /**
     * Genera il testo riepilogativo dell’ordine da inviare via email
     */
    public static function generaTestoOrdine(EOrdine $ordine): string
    {
        $righe = [];
        $righe[] = "Riepilogo Ordine";
        $righe[] = "Data ordine: " . $ordine->getData()->format('d/m/Y H:i');
        $righe[] = "Utente: " . $ordine->getUtente()->getNome() . " " . $ordine->getUtente()->getCognome();

        // Aggiunta fascia oraria
        if ($ordine->getFasciaOraria()) {
            $righe[] = "Fascia oraria richiesta: " . $ordine->getFasciaOraria();
        }

        $righe[] = "";
        $righe[] = "Prodotti richiesti:";

        foreach ($ordine->getItems() as $item) {
            if ($item->getProdottoQuantita()) {
                $prodotto = $item->getProdottoQuantita();
                $righe[] = "- " . $prodotto->getNome() . " x" . $item->getQuantita();
            } elseif ($item->getProdottoPeso()) {
                $prodotto = $item->getProdottoPeso();
                $righe[] = "- " . $prodotto->getNome() . " (~" . $prodotto->getRangePeso() . ") x" . $item->getQuantita();
            }
        }

        $righe[] = "";
        $righe[] = "Totale ordine: €" . number_format($ordine->getPrezzo(), 2, ',', '.');

        // Aggiunta contanti previsti alla consegna (se disponibili)
        if ($ordine->getContanti() !== null) {
            $righe[] = "Importo contanti fornito: €" . number_format($ordine->getContanti(), 2, ',', '.');
        }

        return implode("\n", $righe);
    }
}
