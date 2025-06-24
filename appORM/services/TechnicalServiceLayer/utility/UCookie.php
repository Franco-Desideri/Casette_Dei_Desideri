<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Gestione centralizzata dei cookie
 */
class UCookie
{
    // Imposta un cookie con durata in giorni
    public static function set(string $key, string $value, int $giorni = 7): void
    {
        setcookie($key, $value, time() + (86400 * $giorni), "/");
    }

    // Recupera un cookie
    public static function get(string $key): ?string
    {
        return $_COOKIE[$key] ?? null;
    }

    // Elimina un cookie
    public static function delete(string $key): void
    {
        setcookie($key, '', time() - 3600, "/");
    }
}
