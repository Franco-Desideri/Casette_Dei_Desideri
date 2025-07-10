<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ospiti")
 */
class EOspite
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="string", length=100) */
    private string $nome;

    /** @ORM\Column(type="string", length=100) */
    private string $cognome;

    /** @ORM\Column(type="blob", nullable=true) */
    private $documento;

    /** @ORM\Column(type="string", length=20) */
    private string $tell;

    /** @ORM\Column(type="string", length=16) */
    private string $codiceF;

    /** @ORM\Column(type="string", length=1) */
    private string $sesso;

    /** @ORM\Column(type="date") */
    private \DateTime $dataN;

    /** @ORM\Column(type="string", length=100) */
    private string $luogoN;

    /** @ORM\Column(type="string", nullable=true) */
    private ?string $documentoMime = null;

    /** @ORM\Column(type="string", nullable=true) */
    private ?string $documentoExt = null;


    /**
     * @ORM\ManyToOne(targetEntity="EPrenotazione", inversedBy="ospitiDettagli")
     * @ORM\JoinColumn(nullable=false)
     */
    private EPrenotazione $prenotazione;

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }

    public function getCognome(): string { return $this->cognome; }
    public function setCognome(string $cognome): void { $this->cognome = $cognome; }

    /**
     * @return resource|string|null
     */
    public function getDocumento() {
        return $this->documento;
    }

    /**
     * @param resource|string|null $documento
     */
    public function setDocumento($documento): void {
        $this->documento = $documento;
    }

    public function getTell(): string { return $this->tell; }
    public function setTell(string $tell): void { $this->tell = $tell; }

    public function getCodiceF(): string { return $this->codiceF; }
    public function setCodiceF(string $codiceF): void { $this->codiceF = $codiceF; }

    public function getSesso(): string { return $this->sesso; }
    public function setSesso(string $sesso): void { $this->sesso = $sesso; }

    public function getDataN(): \DateTime { return $this->dataN; }
    public function setDataN(\DateTime $dataN): void { $this->dataN = $dataN; }

    public function getLuogoN(): string { return $this->luogoN; }
    public function setLuogoN(string $luogoN): void { $this->luogoN = $luogoN; }

    public function getPrenotazione(): EPrenotazione { return $this->prenotazione; }
    public function setPrenotazione(EPrenotazione $prenotazione): void { $this->prenotazione = $prenotazione; }

    public function getDocumentoMime(): ?string { return $this->documentoMime; }
    public function setDocumentoMime(string $mime): void { $this->documentoMime = $mime; }

    public function getDocumentoExt(): ?string { return $this->documentoExt; }
    public function setDocumentoExt(string $ext): void { $this->documentoExt = $ext; }
}
