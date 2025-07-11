<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Gestione centralizzata della sessione utente
 */
class USession
{
    // Avvia la sessione (solo se non è già stata avviata)
    public static function start(): void
    {
        // Controlla se la sessione è già attiva; se no, la avvia
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    // Imposta un valore nella sessione associato alla chiave data
    public static function set(string $key, $value): void
    {
        // Scrive il valore nella superglobale $_SESSION
        $_SESSION[$key] = $value;
    }

    // Recupera un valore dalla sessione; ritorna null se la chiave non esiste
    public static function get(string $key)
    {
        // Operatore null coalescing: ritorna il valore se presente, altrimenti null
        return $_SESSION[$key] ?? null;
    }

    // Verifica se una chiave esiste all'interno della sessione
    public static function exists(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    // Elimina una variabile di sessione tramite la sua chiave
    public static function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    // Rimuove tutte le variabili di sessione e distrugge la sessione attiva (es. logout)
    public static function destroy(): void
    {
        session_unset();   // Cancella tutte le variabili di sessione
        session_destroy(); // Distrugge la sessione
    }
}
