<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="date_prenotazioni")
 */
class EDataPrenotazione
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

    public function __construct(\DateTime $dataI, \DateTime $dataF)
    {
        $this->dataI = $dataI;
        $this->dataF = $dataF;
    }

    public function getId(): int { return $this->id; }

    public function getDataI(): \DateTime { return $this->dataI; }
    public function setDataI(\DateTime $dataI): void { $this->dataI = $dataI; }

    public function getDataF(): \DateTime { return $this->dataF; }
    public function setDataF(\DateTime $dataF): void { $this->dataF = $dataF; }
}
