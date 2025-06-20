<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class EProdotto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected int $id;

    /** @ORM\Column(type="string", length=100) */
    protected string $nome;

    /** @ORM\Column(type="string", nullable=true) */
    protected ?string $foto;

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }

    public function getFoto(): ?string { return $this->foto; }
    public function setFoto(?string $foto): void { $this->foto = $foto; }
}
