<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EOrdine;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Foundation per la gestione degli ordini.
 */
class FOrdine
{
    /**
     * Salva un nuovo ordine nel database.
     * 
     * @param EOrdine $ordine L'oggetto ordine da salvare, già completo di utente, prodotti e dettagli.
     * @return void
     */
    public static function creaOrdine(EOrdine $ordine): void
    {
        FPersistentManager::store($ordine);
    }

    /**
     * Restituisce tutti gli ordini associati a un determinato utente.
     * 
     * @param int $utenteId L'ID dell'utente di cui si vogliono recuperare gli ordini.
     * @return EOrdine[] Array di ordini effettuati dall'utente.
     */
    public static function getOrdiniPerUtente(int $utenteId): array
    {
        return FPersistentManager::findBy(EOrdine::class, ['utente' => $utenteId]);
    }

    /**
     * Genera una stringa riepilogativa dell'ordine per l'invio via email o per la stampa.
     * Include data, utente, prodotti richiesti e importo.
     * 
     * @param EOrdine $ordine L'ordine da riassumere.
     * @return string Testo formattato con tutti i dettagli essenziali dell'ordine.
     */
    public static function generaTestoOrdine(EOrdine $ordine): string
    {
        $righe = [];
        $righe[] = "Riepilogo Ordine";
        $righe[] = "Data ordine: " . $ordine->getData()->format('d/m/Y H:i');
        $righe[] = "Utente: " . $ordine->getUtente()->getNome() . " " . $ordine->getUtente()->getCognome();

        // Fascia oraria (se presente)
        if ($ordine->getFasciaOraria()) {
            $righe[] = "Fascia oraria richiesta: " . $ordine->getFasciaOraria();
        }

        $righe[] = "";
        $righe[] = "Prodotti richiesti:";

        // Ciclo sugli item per descriverli
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

        // Eventuale indicazione dei contanti forniti
        if ($ordine->getContanti() !== null) {
            $righe[] = "Importo contanti fornito: €" . number_format($ordine->getContanti(), 2, ',', '.');
        }

        return implode("\n", $righe);
    }
}
