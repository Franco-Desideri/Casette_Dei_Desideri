<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="ordini")
 */
class EOrdine
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="float") */
    private float $prezzo;

    /** @ORM\Column(type="datetime") */
    private \DateTime $data;

    /** @ORM\Column(type="boolean") */
    private bool $conferma;

    /** @ORM\Column(type="string", nullable=true) */
    private ?string $fasciaOraria = null;


    /**
     * @ORM\ManyToOne(targetEntity="EUtente", inversedBy="ordini")
     * @ORM\JoinColumn(nullable=false)
     */
    private EUtente $utente;

    /**
     * @ORM\OneToMany(targetEntity="EOrdineItem", mappedBy="ordine", cascade={"persist", "remove"})
     */
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getPrezzo(): float { return $this->prezzo; }
    public function setPrezzo(float $prezzo): void { $this->prezzo = $prezzo; }

    public function getData(): \DateTime { return $this->data; }
    public function setData(\DateTime $data): void { $this->data = $data; }

    public function isConferma(): bool { return $this->conferma; }
    public function setConferma(bool $conferma): void { $this->conferma = $conferma; }

    public function getUtente(): EUtente { return $this->utente; }
    public function setUtente(EUtente $utente): void { $this->utente = $utente; }

    public function getFasciaOraria(): ?string
    {
        return $this->fasciaOraria;
    }

    public function setFasciaOraria(?string $fasciaOraria): void
    {
        $this->fasciaOraria = $fasciaOraria;
    }


    public function getItems(): Collection { return $this->items; }

    public function addItem(EOrdineItem $item): void
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setOrdine($this);
        }
    }

    public function removeItem(EOrdineItem $item): void
    {
        $this->items->removeElement($item);
    }
}
