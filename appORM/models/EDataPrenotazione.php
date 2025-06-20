<?php

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

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getDataI(): \DateTime { return $this->dataI; }
    public function setDataI(\DateTime $dataI): void { $this->dataI = $dataI; }

    public function getDataF(): \DateTime { return $this->dataF; }
    public function setDataF(\DateTime $dataF): void { $this->dataF = $dataF; }
}
