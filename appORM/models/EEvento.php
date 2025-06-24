<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="eventi")
 */
class EEvento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $immagine;

    /**
     * @ORM\Column(type="string")
     */
    private string $titolo;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTime $dataInizio;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTime $dataFine;

    // Getter e Setter
    public function getId(): int {
        return $this->id;
    }

    public function getImmagine(): string {
        return $this->immagine;
    }

    public function setImmagine(string $immagine): void {
        $this->immagine = $immagine;
    }

    public function getTitolo(): string {
        return $this->titolo;
    }

    public function setTitolo(string $titolo): void {
        $this->titolo = $titolo;
    }

    public function setDataInizio(\DateTime $dataInizio): void {
        $this->dataInizio = $dataInizio;
    }

    public function getDataInizioString(string $format = 'd/m/Y'): string {
        return $this->dataInizio->format($format);
    }

    public function getDataFineString(string $format = 'd/m/Y'): string {
        return $this->dataFine->format($format);
    }


    public function setDataFine(\DateTime $dataFine): void {
        $this->dataFine = $dataFine;
    }
}
