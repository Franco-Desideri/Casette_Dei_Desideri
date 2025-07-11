<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Utility per validazioni dei dati utente
 */
class UValidazione
{
    // Verifica se l'email è nel formato corretto
    public static function emailValida(string $email): bool {
        // Usa il filtro nativo PHP per validare l'email
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Verifica se la password ha almeno 6 caratteri
    public static function passwordSicura(string $password): bool {
        return strlen($password) >= 6;
    }

    // Controlla che la password e la conferma coincidano
    public static function confermaPassword(string $password, string $conferma): bool {
        return $password === $conferma;
    }

    // Verifica che il codice fiscale sia lungo 16 caratteri alfanumerici
    public static function codiceFiscaleValido(string $cf): bool {
        return strlen($cf) === 16 && ctype_alnum($cf);
    }

    // Controlla che il valore del sesso sia 'M' o 'F'
    public static function sessoValido(string $sesso): bool {
        return in_array($sesso, ['M', 'F']);
    }

    // Verifica che il numero di telefono sia composto da 6 a 20 cifre
    public static function telefonoValido(string $telefono): bool {
        return preg_match('/^[0-9]{6,20}$/', $telefono);
    }
}
