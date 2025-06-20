<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="prodotti_peso")
 */
class EProdottoPeso extends EProdotto
{
    /** @ORM\Column(type="float") */
    private float $prezzoKg;

    /** @ORM\Column(type="string", length=50) */
    private string $rangePeso;

    /** @ORM\Column(type="float") */
    private float $prezzoRange;

    /**
     * @ORM\OneToMany(targetEntity="EOrdineItem", mappedBy="prodottoPeso")
     */
    private Collection $ordiniItem;

    public function __construct()
    {
        $this->ordiniItem = new ArrayCollection();
    }

    // Getter e Setter

    public function getPrezzoKg(): float { return $this->prezzoKg; }
    public function setPrezzoKg(float $prezzoKg): void { $this->prezzoKg = $prezzoKg; }

    public function getRangePeso(): string { return $this->rangePeso; }
    public function setRangePeso(string $rangePeso): void { $this->rangePeso = $rangePeso; }

    public function getPrezzoRange(): float { return $this->prezzoRange; }
    public function setPrezzoRange(float $prezzoRange): void { $this->prezzoRange = $prezzoRange; }

    public function getOrdiniItem(): Collection { return $this->ordiniItem; }

    public function addOrdineItem(EOrdineItem $item): void
    {
        if (!$this->ordiniItem->contains($item)) {
            $this->ordiniItem[] = $item;
            $item->setProdottoPeso($this);
        }
    }

    public function removeOrdineItem(EOrdineItem $item): void
    {
        $this->ordiniItem->removeElement($item);
    }
}
