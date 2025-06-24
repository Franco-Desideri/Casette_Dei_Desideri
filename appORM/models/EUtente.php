<?php

namespace App\models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="utenti")
 */
class EUtente
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

    /** @ORM\Column(type="string", unique=true, length=255) */
    private string $email;

    /** @ORM\Column(type="string", length=255) */
    private string $password;

    /** @ORM\Column(type="string", length=16, unique=true) */
    private string $codicefisc;

    /** @ORM\Column(type="string", length=1) */
    private string $sesso;

    /** @ORM\Column(type="date") */
    private \DateTime $dataN;

    /** @ORM\Column(type="string", length=100) */
    private string $luogoN;

    /** @ORM\Column(type="string", length=20) */
    private string $tell;

    /** @ORM\Column(type="string", length=20) */
    private string $ruolo = 'utente';

    /**
     * @ORM\OneToMany(targetEntity="EPrenotazione", mappedBy="utente", cascade={"persist", "remove"})
     */
    private Collection $prenotazioni;

    /**
     * @ORM\OneToMany(targetEntity="EOrdine", mappedBy="utente", cascade={"persist", "remove"})
     */
    private Collection $ordini;

    public function __construct()
    {
        $this->prenotazioni = new ArrayCollection();
        $this->ordini = new ArrayCollection();
    }

    // Getter e Setter

    public function getId(): int { return $this->id; }

    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }

    public function getCognome(): string { return $this->cognome; }
    public function setCognome(string $cognome): void { $this->cognome = $cognome; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }

    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): void { $this->password = $password; }

    public function getCodicefisc(): string { return $this->codicefisc; }
    public function setCodicefisc(string $codicefisc): void { $this->codicefisc = $codicefisc; }

    public function getSesso(): string { return $this->sesso; }
    public function setSesso(string $sesso): void { $this->sesso = $sesso; }

    public function getDataN(): \DateTime { return $this->dataN; }
    public function setDataN(\DateTime $dataN): void { $this->dataN = $dataN; }

    public function getLuogoN(): string { return $this->luogoN; }
    public function setLuogoN(string $luogoN): void { $this->luogoN = $luogoN; }

    public function getTell(): string { return $this->tell; }
    public function setTell(string $tell): void { $this->tell = $tell; }

    public function getRuolo(): string { return $this->ruolo; }
    public function setRuolo(string $ruolo): void { $this->ruolo = $ruolo; }

    // Prenotazioni

    public function getPrenotazioni(): Collection { return $this->prenotazioni; }

    public function addPrenotazione(EPrenotazione $prenotazione): void {
        if (!$this->prenotazioni->contains($prenotazione)) {
            $this->prenotazioni[] = $prenotazione;
            $prenotazione->setUtente($this);
        }
    }

    public function removePrenotazione(EPrenotazione $prenotazione): void {
        $this->prenotazioni->removeElement($prenotazione);
    }

    // Ordini

    public function getOrdini(): Collection { return $this->ordini; }

    public function addOrdine(EOrdine $ordine): void {
        if (!$this->ordini->contains($ordine)) {
            $this->ordini[] = $ordine;
            $ordine->setUtente($this);
        }
    }

    public function removeOrdine(EOrdine $ordine): void {
        $this->ordini->removeElement($ordine);
    }

    public static function getAdmin(): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['ruolo' => 'admin']);
    }

}
