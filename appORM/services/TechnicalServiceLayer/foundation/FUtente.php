<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EUtente;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;

/**
 * Classe Foundation per operazioni su EUtente
 */
class FUtente
{
    /**
     * Recupera un utente per ID
     */
    public static function getById(int $id): ?EUtente
    {
        return FPersistentManager::find(EUtente::class, $id);
    }

    /**
     * Recupera un utente per email
     */
    public static function getByEmail(string $email): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['email' => $email]);
    }

    /**
     * Verifica le credenziali dell'utente
     * @throws \Exception se credenziali non valide
     */
    public static function verificaCredenziali(string $email, string $password): ?EUtente
    {
        $utente = self::getByEmail($email);

        if (!$utente) {
            throw new \Exception("Email non registrata.");
        }

        if (!self::validaPassword($password)) {
            throw new \Exception("La password non rispetta i criteri richiesti.");
        }

        if (!self::verificaPassword($password, $utente->getPassword())) {
            throw new \Exception("Password errata.");
        }

        return $utente;
    }

    /**
     * Valida la password in base a criteri minimi
     */
    public static function validaPassword(string $password): bool
    {
        return preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }

    /**
     * Verifica se la password in chiaro corrisponde all'hash
     */
    public static function verificaPassword(string $plain, string $hashed): bool
    {
        return password_verify($plain, $hashed);
    }

    /**
     * Restituisce le prenotazioni dell'utente
     */
    public static function getPrenotazioni(EUtente $utente): array
    {
        return $utente->getPrenotazioni()->toArray();
    }

    /**
     * Restituisce gli ordini dell'utente
     */
    public static function getOrdini(EUtente $utente): array
    {
        return $utente->getOrdini()->toArray();
    }
}
