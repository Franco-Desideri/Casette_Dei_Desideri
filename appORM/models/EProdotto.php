<?php

namespace App\models;

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

    /** @ORM\Column(type="blob", nullable=true) */
    protected $foto;

    /** @ORM\Column(type="boolean") */
    protected bool $visibile = true;


    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }

    public function getFoto(){ return $this->foto; }

    public function setFoto($foto): void { $this->foto = $foto; }

    public function isVisibile(): bool {return $this->visibile;}
    
    public function setVisibile(bool $visibile): void {$this->visibile = $visibile;}

    public function getFotoBase64(): ?string
{
    $foto = $this->getFoto(); // Recupera il BLOB (binario o stream)
    
    if ($foto) {
        if (is_resource($foto)) {
            rewind($foto); // Riporta il cursore all'inizio del flusso
            $data = stream_get_contents($foto);
        } else {
            $data = $foto; // È già una stringa binaria
        }

        return 'data:image/jpeg;base64,' . base64_encode($data);
    }

    return null; // Nessuna immagine disponibile
}


}
