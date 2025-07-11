<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\ELockPrenotazione;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Foundation class per la gestione dei lock di prenotazione.
 * I lock servono a evitare che più utenti prenotino la stessa struttura
 * nello stesso periodo mentre stanno compilando i dati.
 */
class FLockPrenotazione
{
    private EntityManagerInterface $em;

    public function __construct()
    {
        // Inizializza l'EntityManager tramite il gestore centralizzato
        $this->em = FPersistentManager::get();
    }

    /**
     * Verifica se esiste un lock attivo per una struttura e una data specifica.
     * 
     * @param int $strutturaId ID della struttura.
     * @param \DateTimeInterface $data Data per cui verificare il lock.
     * @return bool True se esiste un lock ancora valido, false altrimenti.
     */
    public function esisteLockAttivo(int $strutturaId, \DateTimeInterface $data): bool
    {
        $oggi = new \DateTime();

        $lock = $this->em->getRepository(ELockPrenotazione::class)->findOneBy([
            'struttura_id' => $strutturaId,
            'data' => $data,
        ]);

        return $lock && $lock->getScadenza() > $oggi;
    }

    /**
     * Inserisce un nuovo lock per una struttura in una determinata data.
     * 
     * @param ELockPrenotazione $lock Il lock da salvare.
     * @return void
     */
    public function inserisciLock(ELockPrenotazione $lock): void
    {
        $this->em->persist($lock);
        $this->em->flush();
    }

    /**
     * Rimuove tutti i lock che sono scaduti rispetto alla data e ora attuale.
     * 
     * @return void
     */
    public function rimuoviScaduti(): void
    {
        $this->em->createQuery('DELETE FROM App\models\ELockPrenotazione l WHERE l.scadenza < :now')
            ->setParameter('now', new \DateTime())
            ->execute();
    }

    /**
     * Rimuove tutti i lock attivi associati a un utente specifico.
     * Tipicamente chiamata dopo la conferma della prenotazione.
     * 
     * @param int $utenteId ID dell'utente.
     * @return void
     */
    public function rimuoviPerUtente(int $utenteId): void
    {
        $this->em->createQuery('DELETE FROM App\models\ELockPrenotazione l WHERE l.utente_id = :utente')
            ->setParameter('utente', $utenteId)
            ->execute();
    }
}
