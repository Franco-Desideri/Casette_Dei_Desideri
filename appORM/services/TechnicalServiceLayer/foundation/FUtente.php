<?php

namespace App\services\TechnicalServiceLayer\foundation;

use App\models\EUtente;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use Exception;


/**
 * Classe Foundation per operazioni su EUtente
 */
class FUtente
{
    public static function getById(int $id): ?EUtente
    {
        return FPersistentManager::find(EUtente::class, $id);
    }

    public static function getByEmail(string $email): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['email' => $email]);
    }

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

    public static function validaPassword(string $password): bool
    {
        return preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }

    public static function getPrenotazioni(EUtente $utente): array
    {
        return $utente->getPrenotazioni()->toArray();
    }

    public static function getOrdini(EUtente $utente): array
    {
        return $utente->getOrdini()->toArray();
    }

    public static function getAdmin(): ?EUtente
    {
        return FPersistentManager::findOneBy(EUtente::class, ['ruolo' => 'admin']);
    }
}
