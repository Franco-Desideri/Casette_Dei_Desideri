<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="strutture")
 */
class EStruttura
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="string", length=255) */
    private string $titolo;

    /** @ORM\Column(type="text") */
    private string $descrizione;

    /** @ORM\Column(type="float") */
    private float $m2;

    /** @ORM\Column(type="integer") */
    private int $numOspiti;

    /** @ORM\Column(type="string", length=255) */
    private string $luogo;

    /** @ORM\Column(type="integer") */
    private int $nBagni;

    /** @ORM\Column(type="integer") */
    private int $nLetti;

    /** @ORM\Column(type="boolean") */
    private bool $colazione;

    /** @ORM\Column(type="boolean") */
    private bool $animali;

    /** @ORM\Column(type="boolean") */
    private bool $parcheggio;

    /** @ORM\Column(type="boolean") */
    private bool $wifi;

    /** @ORM\Column(type="boolean") */
    private bool $balcone;

    
    /** @ORM\Column(type="boolean") */
    private bool $cancellata = false;

    /**
     * @ORM\OneToMany(targetEntity="EPrenotazione", mappedBy="struttura", cascade={"persist", "remove"})
     */
    private Collection $prenotazioni;

    /**
     * @ORM\OneToMany(targetEntity="EIntervallo", mappedBy="struttura", cascade={"persist", "remove"})
     */
    private Collection $intervalli;

    /**
     * @ORM\OneToMany(targetEntity="EFoto", mappedBy="struttura", cascade={"persist", "remove"})
     */
    private Collection $foto;


    public function __construct()
    {
        $this->prenotazioni = new ArrayCollection();
        $this->intervalli = new ArrayCollection();
        $this->foto = new ArrayCollection();
    }

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getTitolo(): string { return $this->titolo; }
    public function setTitolo(string $titolo): void { $this->titolo = $titolo; }

    public function getDescrizione(): string { return $this->descrizione; }
    public function setDescrizione(string $descrizione): void { $this->descrizione = $descrizione; }

    public function getM2(): float { return $this->m2; }
    public function setM2(float $m2): void { $this->m2 = $m2; }

    public function getNumOspiti(): int { return $this->numOspiti; }
    public function setNumOspiti(int $numOspiti): void { $this->numOspiti = $numOspiti; }

    public function getLuogo(): string { return $this->luogo; }
    public function setLuogo(string $luogo): void { $this->luogo = $luogo; }

    public function getNBagni(): int { return $this->nBagni; }
    public function setNBagni(int $nBagni): void { $this->nBagni = $nBagni; }

    public function getNLetti(): int { return $this->nLetti; }
    public function setNLetti(int $nLetti): void { $this->nLetti = $nLetti; }

    public function getColazione(): bool { return $this->colazione; }
    public function setColazione(bool $colazione): void { $this->colazione = $colazione; }

    public function getAnimali(): bool { return $this->animali; }
    public function setAnimali(bool $animali): void { $this->animali = $animali; }

    public function getParcheggio(): bool { return $this->parcheggio; }
    public function setParcheggio(bool $parcheggio): void { $this->parcheggio = $parcheggio; }

    public function getWifi(): bool { return $this->wifi; }
    public function setWifi(bool $wifi): void { $this->wifi = $wifi; }

    public function getBalcone(): bool { return $this->balcone; }
    public function setBalcone(bool $balcone): void { $this->balcone = $balcone; }

    // Relazioni

    public function getPrenotazioni(): Collection { return $this->prenotazioni; }
    public function addPrenotazione(EPrenotazione $prenotazione): void {
        if (!$this->prenotazioni->contains($prenotazione)) {
            $this->prenotazioni[] = $prenotazione;
            $prenotazione->setStruttura($this);
        }
    }
    public function removePrenotazione(EPrenotazione $prenotazione): void {
        $this->prenotazioni->removeElement($prenotazione);
    }

    public function getIntervalli(): Collection { return $this->intervalli; }

    public function addIntervallo(EIntervallo $intervallo): void {
        if (!$this->intervalli->contains($intervallo)) {
            $this->intervalli[] = $intervallo;
            $intervallo->setStruttura($this);
        }
    }
    public function removeIntervallo(EIntervallo $intervallo): void {
        $this->intervalli->removeElement($intervallo);
    }

    public function getFoto(): Collection { return $this->foto; }

    public function addFoto(EFoto $foto): void
    {
        if (!$this->foto->contains($foto)) {
            $this->foto[] = $foto;
            $foto->setStruttura($this);
        }
    }

    public function removeFoto(EFoto $foto): void
    {
        $this->foto->removeElement($foto);
    }

    public function getImmaginePrincipaleBase64(): ?string{
        $foto = $this->getFoto()->first();
        if ($foto && $foto->getImmagine()) {
            $stream = $foto->getImmagine();
            if (is_resource($stream)) {
                rewind($stream);    //cursore a posizione 0
                $data = stream_get_contents($stream);   //legge tutti i dati dall’inizio
            } else {
                $data = $stream;    //se è già stringa binaria
            }
            return 'data:image/jpeg;base64,' . base64_encode($data);
        }
        return null;
    }

    public function isCancellata(): bool {
        return $this->cancellata;
    }

    public function setCancellata(bool $cancellata): void {
        $this->cancellata = $cancellata;
    }
}
