<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Utility per validazioni dei dati utente
 */
class UValidazione
{
    public static function emailValida(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function passwordSicura(string $password): bool {
        return strlen($password) >= 6;
    }

    public static function confermaPassword(string $password, string $conferma): bool {
        return $password === $conferma;
    }

    public static function codiceFiscaleValido(string $cf): bool {
        return strlen($cf) === 16 && ctype_alnum($cf);
    }

    public static function sessoValido(string $sesso): bool {
        return in_array($sesso, ['M', 'F']);
    }

    public static function telefonoValido(string $telefono): bool {
        return preg_match('/^[0-9]{6,20}$/', $telefono);
    }
}
