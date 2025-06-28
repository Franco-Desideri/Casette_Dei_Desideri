<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="prenotazioni")
 */
class EPrenotazione
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="integer") */
    private int $ospiti;

    /** @ORM\Column(type="float") */
    private float $prezzo;

    /** @ORM\Column(type="boolean") */
    private bool $pagata;

    /**
     * @ORM\ManyToOne(targetEntity="EUtente", inversedBy="prenotazioni")
     * @ORM\JoinColumn(nullable=false)
     */
    private EUtente $utente;

    /**
     * @ORM\ManyToOne(targetEntity="EStruttura", inversedBy="prenotazioni")
     * @ORM\JoinColumn(nullable=false)
     */
    private EStruttura $struttura;

    /**
     * @ORM\OneToOne(targetEntity="EDataPrenotazione", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private EDataPrenotazione $periodo;

    /**
     * @ORM\OneToMany(targetEntity="EOspite", mappedBy="prenotazione", cascade={"persist", "remove"})
     */
    private Collection $ospitiDettagli;

    /**
     * @ORM\ManyToOne(targetEntity="ECartaCredito", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ECartaCredito $cartaCredito;

    public function __construct()
    {
        $this->ospitiDettagli = new ArrayCollection();
        $this->ospiti = 0;
    }

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getOspiti(): int { return $this->ospiti; }
    public function setOspiti(int $ospiti): void { $this->ospiti = $ospiti; }

    public function getPrezzo(): float { return $this->prezzo; }
    public function setPrezzo(float $prezzo): void { $this->prezzo = $prezzo; }

    public function isPagata(): bool { return $this->pagata; }
    public function setPagata(bool $pagata): void { $this->pagata = $pagata; }

    public function getUtente(): EUtente { return $this->utente; }
    public function setUtente(EUtente $utente): void { $this->utente = $utente; }

    public function getStruttura(): EStruttura { return $this->struttura; }
    public function setStruttura(EStruttura $struttura): void { $this->struttura = $struttura; }

    public function getPeriodo(): EDataPrenotazione { return $this->periodo; }
    public function setPeriodo(EDataPrenotazione $periodo): void { $this->periodo = $periodo; }

    public function getCartaCredito(): ECartaCredito { return $this->cartaCredito; }
    public function setCartaCredito(ECartaCredito $cartaCredito): void { $this->cartaCredito = $cartaCredito; }

    // Ospiti dettagliati

    public function getOspitiDettagli(): Collection { return $this->ospitiDettagli; }

    public function addOspite(EOspite $ospite): void
    {
        if (!$this->ospitiDettagli->contains($ospite)) {
            $this->ospitiDettagli[] = $ospite;
            $ospite->setPrenotazione($this);
        }
    }

    public function removeOspite(EOspite $ospite): void
    {
        $this->ospitiDettagli->removeElement($ospite);
    }
}
