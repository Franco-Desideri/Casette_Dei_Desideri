<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lock_prenotazione", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="unique_lock", columns={"struttura_id", "data"})
 * })
 */
class ELockPrenotazione
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $struttura_id;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTimeInterface $data;

    /**
     * @ORM\Column(type="integer")
     */
    private int $utente_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $scadenza;

    // ====== Getter e Setter ======

    public function getId(): int
    {
        return $this->id;
    }

    public function getStrutturaId(): int
    {
        return $this->struttura_id;
    }

    public function setStrutturaId(int $struttura_id): self
    {
        $this->struttura_id = $struttura_id;
        return $this;
    }

    public function getData(): \DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getUtenteId(): int
    {
        return $this->utente_id;
    }

    public function setUtenteId(int $utente_id): self
    {
        $this->utente_id = $utente_id;
        return $this;
    }

    public function getScadenza(): \DateTimeInterface
    {
        return $this->scadenza;
    }

    public function setScadenza(\DateTimeInterface $scadenza): self
    {
        $this->scadenza = $scadenza;
        return $this;
    }
}
