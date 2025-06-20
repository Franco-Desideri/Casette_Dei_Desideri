<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ordini_item")
 */
class EOrdineItem
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="integer") */
    private int $quantita;

    /**
     * @ORM\ManyToOne(targetEntity="EProdottoQuantita", inversedBy="ordiniItem")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?EProdottoQuantita $prodottoQuantita = null;

    /**
     * @ORM\ManyToOne(targetEntity="EProdottoPeso", inversedBy="ordiniItem")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?EProdottoPeso $prodottoPeso = null;

    /**
     * @ORM\ManyToOne(targetEntity="EOrdine", inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private EOrdine $ordine;

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getQuantita(): int { return $this->quantita; }
    public function setQuantita(int $quantita): void { $this->quantita = $quantita; }

    public function getProdottoQuantita(): ?EProdottoQuantita { return $this->prodottoQuantita; }
    public function setProdottoQuantita(?EProdottoQuantita $prodotto): void { $this->prodottoQuantita = $prodotto; }

    public function getProdottoPeso(): ?EProdottoPeso { return $this->prodottoPeso; }
    public function setProdottoPeso(?EProdottoPeso $prodotto): void { $this->prodottoPeso = $prodotto; }

    public function getOrdine(): EOrdine { return $this->ordine; }
    public function setOrdine(EOrdine $ordine): void { $this->ordine = $ordine; }
}
