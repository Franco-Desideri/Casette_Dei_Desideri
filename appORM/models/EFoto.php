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

    /** @ORM\Column(type="blob", nullable=true) */
    private $immagine;


    /**
     * @ORM\ManyToOne(targetEntity="EStruttura", inversedBy="foto")
     * @ORM\JoinColumn(nullable=false)
     */
    private EStruttura $struttura;

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getImmagine() { return $this->immagine; }

    public function setImmagine($img): void { $this->immagine = $img;   }


    public function getStruttura(): EStruttura { return $this->struttura; }
    public function setStruttura(EStruttura $struttura): void { $this->struttura = $struttura; }
}
