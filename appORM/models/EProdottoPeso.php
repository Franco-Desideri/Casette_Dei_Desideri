<?php

namespace App\models;

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

    public function getRangePeso(): int {
        return (int) filter_var($this->rangePeso, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setRangePeso(string $rangePeso): void { $this->rangePeso = $rangePeso; }

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
