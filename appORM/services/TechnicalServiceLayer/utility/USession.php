<?php

/**
 * Gestione centralizzata della sessione utente
 */
class USession
{
    // Avvia la sessione (solo se non già avviata)
    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    // Imposta un valore nella sessione
    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    // Recupera un valore dalla sessione
    public static function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    // Verifica se una chiave esiste nella sessione
    public static function exists(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    // Elimina una chiave dalla sessione
    public static function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    // Distrugge l'intera sessione (es. logout)
    public static function destroy(): void
    {
        session_unset();
        session_destroy();
    }
}
