<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EUtente;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use Exception;

/**
 * Classe Foundation per operazioni su EUtente
 *
 * Fornisce metodi statici per l'accesso e la manipolazione di oggetti `EUtente`,
 * isolando la logica di accesso ai dati tramite `FPersistentManager`.
 */
class FUtente
{
    /**
     * Recupera un utente dato il suo ID.
     */
    public static function getById(int $id): ?EUtente
    {
        return FPersistentManager::find(EUtente::class, $id);
    }

    /**
     * Recupera un utente in base all'indirizzo email.
     */
    public static function getByEmail(string $email): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['email' => $email]);
    }

    /**
     * Verifica se le credenziali email/password sono corrette.
     *
     * @throws Exception in caso di email non registrata, password non valida o errata.
     */
    public static function verificaCredenziali(string $email, string $password): ?EUtente
    {
        $utente = self::getByEmail($email);

        if (!$utente) {
            throw new Exception("Email non registrata.");
        }

        if (!self::validaPassword($password)) {
            throw new Exception("La password non rispetta i criteri richiesti.");
        }

        if ($utente->getPassword() !== $password) {
            throw new Exception("Password errata.");
        }

        return $utente;
    }

    /**
     * Verifica se la password rispetta il formato richiesto:
     * - almeno 8 caratteri
     * - almeno una lettera maiuscola
     * - almeno una cifra
     */
    public static function validaPassword(string $password): bool
    {
        return preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }

    /**
     * Restituisce tutte le prenotazioni associate all’utente.
     */
    public static function getPrenotazioni(EUtente $utente): array
    {
        return $utente->getPrenotazioni()->toArray();
    }

    /**
     * Recupera l’utente amministratore (ruolo = "admin").
     */
    public static function getAdmin(): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['ruolo' => 'admin']);
    }

    /**
     * Restituisce l'utente dato un codice fiscale.
     */
    public static function getByCodiceFiscale(string $cf): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['codicefisc' => $cf]);
    }

    /**
     * Aggiorna l'indirizzo email dell'utente e salva la modifica.
     */
    public static function aggiornaEmail(EUtente $utente, string $email): void
    {
        $utente->setEmail($email);
        FPersistentManager::store($utente);
    }

    /**
     * Aggiorna il numero di telefono dell'utente e salva la modifica.
     */
    public static function aggiornaTelefono(EUtente $utente, string $telefono): void
    {
        $utente->setTell($telefono);
        FPersistentManager::store($utente);
    }
}
