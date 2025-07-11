<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Gestione centralizzata dei cookie
 */
class UCookie
{
    // Imposta un cookie con chiave, valore e durata in giorni (default 7 giorni)
    public static function set(string $key, string $value, int $giorni = 7): void
    {
        // setcookie imposta un cookie valido per $giorni giorni, path "/" (tutto il sito)
        setcookie($key, $value, time() + (86400 * $giorni), "/");
    }

    // Recupera il valore di un cookie dato il nome (chiave)
    public static function get(string $key): ?string
    {
        // Ritorna il valore del cookie se esiste, altrimenti null
        return $_COOKIE[$key] ?? null;
    }

    // Elimina un cookie impostandone la scadenza nel passato
    public static function delete(string $key): void
    {
        // setcookie con tempo passato fa scadere il cookie immediatamente
        setcookie($key, '', time() - 3600, "/");
    }
}
