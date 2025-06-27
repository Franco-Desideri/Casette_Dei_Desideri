<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="prodotti_quantita")
 */
class EProdottoQuantita extends EProdotto
{
    /** @ORM\Column(type="float") */
    private float $prezzo;

    /** @ORM\Column(type="float") */
    private float $peso;

    /**
     * @ORM\OneToMany(targetEntity="EOrdineItem", mappedBy="prodottoQuantita")
     */
    private Collection $ordiniItem;

    public function __construct()
    {
        $this->ordiniItem = new ArrayCollection();
    }

    // Getter e Setter

    public function getPrezzo(): float { return $this->prezzo; }
    public function setPrezzo(float $prezzo): void { $this->prezzo = $prezzo; }

    public function getPeso(): float { return $this->peso; }
    public function setPeso(float $peso): void { $this->peso = $peso; }

    public function getOrdiniItem(): Collection { return $this->ordiniItem; }

    public function addOrdineItem(EOrdineItem $item): void
    {
        if (!$this->ordiniItem->contains($item)) {
            $this->ordiniItem[] = $item;
            $item->setProdottoQuantita($this);
        }
    }

    public function removeOrdineItem(EOrdineItem $item): void
    {
        $this->ordiniItem->removeElement($item);
    }
}
