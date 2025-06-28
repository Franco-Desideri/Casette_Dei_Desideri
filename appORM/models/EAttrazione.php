<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="attrazioni")
 */
class EAttrazione
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="blob", nullable=true) */
    private $immagine;

    /**
     * @ORM\Column(type="text")
     */
    private string $descrizione;

    // Getter e Setter
    public function getId(): int {
        return $this->id;
    }

    public function getImmagine() { return $this->immagine; }

    public function setImmagine($immagine): void { $this->immagine = $immagine; }

    public function getDescrizione(): string {
        return $this->descrizione;
    }

    public function setDescrizione(string $descrizione): void {
        $this->descrizione = $descrizione;
    }
}
