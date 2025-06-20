<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="intervalli")
 */
class EIntervallo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="date") */
    private \DateTime $dataI;

    /** @ORM\Column(type="date") */
    private \DateTime $dataF;

    /** @ORM\Column(type="float") */
    private float $prezzo;

    /**
     * @ORM\ManyToOne(targetEntity="EStruttura", inversedBy="intervalli")
     * @ORM\JoinColumn(nullable=false)
     */
    private EStruttura $struttura;

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getDataI(): \DateTime { return $this->dataI; }
    public function setDataI(\DateTime $dataI): void { $this->dataI = $dataI; }

    public function getDataF(): \DateTime { return $this->dataF; }
    public function setDataF(\DateTime $dataF): void { $this->dataF = $dataF; }

    public function getPrezzo(): float { return $this->prezzo; }
    public function setPrezzo(float $prezzo): void { $this->prezzo = $prezzo; }

    public function getStruttura(): EStruttura { return $this->struttura; }
    public function setStruttura(EStruttura $struttura): void { $this->struttura = $struttura; }
}
