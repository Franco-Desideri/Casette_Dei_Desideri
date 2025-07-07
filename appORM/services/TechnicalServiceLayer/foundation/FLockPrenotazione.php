<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\ELockPrenotazione;
use Doctrine\ORM\EntityManagerInterface;

class FLockPrenotazione
{
    private EntityManagerInterface $em;

    public function __construct()
    {
        $this->em = FPersistentManager::get(); // <-- è già l'EntityManager
    }

    /**
     * Ritorna true se esiste già un lock attivo per struttura e giorno
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
     * Inserisce un nuovo lock per una struttura e giorno
     */
    public function inserisciLock(ELockPrenotazione $lock): void
    {
        $this->em->persist($lock);
        $this->em->flush();
    }

    /**
     * Rimuove tutti i lock scaduti
     */
    public function rimuoviScaduti(): void
    {
        $this->em->createQuery('DELETE FROM App\models\ELockPrenotazione l WHERE l.scadenza < :now')
            ->setParameter('now', new \DateTime())
            ->execute();
    }

    /**
     * Rimuove tutti i lock associati a un utente (es. dopo conferma prenotazione)
     */
    public function rimuoviPerUtente(int $utenteId): void
    {
        $this->em->createQuery('DELETE FROM App\models\ELockPrenotazione l WHERE l.utente_id = :utente')
            ->setParameter('utente', $utenteId)
            ->execute();
    }
}
