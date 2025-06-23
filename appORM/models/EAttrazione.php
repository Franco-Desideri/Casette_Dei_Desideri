<?php

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

    /**
     * @ORM\Column(type="string")
     */
    private string $immagine;

    /**
     * @ORM\Column(type="text")
     */
    private string $descrizione;

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

    public function getDescrizione(): string {
        return $this->descrizione;
    }

    public function setDescrizione(string $descrizione): void {
        $this->descrizione = $descrizione;
    }
}
