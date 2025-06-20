<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="carte_credito")
 */
class ECartaCredito
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="string", length=100) */
    private string $nomeTitolare;

    /** @ORM\Column(type="string", length=100) */
    private string $cognomeTitolare;

    /** @ORM\Column(type="date") */
    private \DateTime $dataScadenza;

    /** @ORM\Column(type="string", length=19) */
    private string $numero;

    /** @ORM\Column(type="string", length=4) */
    private string $ccv;

    /**
     * @ORM\OneToMany(targetEntity="EPrenotazione", mappedBy="cartaCredito")
     */
    private Collection $prenotazioni;

    public function __construct()
    {
        $this->prenotazioni = new ArrayCollection();
    }

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getNomeTitolare(): string { return $this->nomeTitolare; }
    public function setNomeTitolare(string $nomeTitolare): void { $this->nomeTitolare = $nomeTitolare; }

    public function getCognomeTitolare(): string { return $this->cognomeTitolare; }
    public function setCognomeTitolare(string $cognomeTitolare): void { $this->cognomeTitolare = $cognomeTitolare; }

    public function getDataScadenza(): \DateTime { return $this->dataScadenza; }
    public function setDataScadenza(\DateTime $dataScadenza): void { $this->dataScadenza = $dataScadenza; }

    public function getNumero(): string { return $this->numero; }
    public function setNumero(string $numero): void { $this->numero = $numero; }

    public function getCcv(): string { return $this->ccv; }
    public function setCcv(string $ccv): void { $this->ccv = $ccv; }

    public function getPrenotazioni(): Collection { return $this->prenotazioni; }

    public function addPrenotazione(EPrenotazione $prenotazione): void
    {
        if (!$this->prenotazioni->contains($prenotazione)) {
            $this->prenotazioni[] = $prenotazione;
            $prenotazione->setCartaCredito($this);
        }
    }

    public function removePrenotazione(EPrenotazione $prenotazione): void
    {
        $this->prenotazioni->removeElement($prenotazione);
    }
}
