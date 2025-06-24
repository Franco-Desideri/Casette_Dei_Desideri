<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="foto_strutture")
 */
class EFoto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="string", length=255) */
    private string $percorso;

    /**
     * @ORM\ManyToOne(targetEntity="EStruttura", inversedBy="foto")
     * @ORM\JoinColumn(nullable=false)
     */
    private EStruttura $struttura;

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getPercorso(): string { return $this->percorso; }
    public function setPercorso(string $percorso): void { $this->percorso = $percorso; }

    public function getStruttura(): EStruttura { return $this->struttura; }
    public function setStruttura(EStruttura $struttura): void { $this->struttura = $struttura; }
}
