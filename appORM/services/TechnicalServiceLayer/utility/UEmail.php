<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Utility per inviare email in modo centralizzato
 */
class UEmail
{
    /**
     * Invia una email semplice
     *
     * @param string $destinatario Indirizzo email del destinatario
     * @param string $oggetto Oggetto della mail
     * @param string $testo Corpo della mail (plain text)
     * @param string|null $mittente Mittente (facoltativo), altrimenti default
     * @return bool true se invio riuscito, false altrimenti
     */
    public static function invia(string $destinatario, string $oggetto, string $testo, ?string $mittente = null): bool
    {
        // Mittente di default se non specificato
        $mittente = $mittente ?? 'noreply@casette.local';

        // Header base (Content-Type, From, ecc.)
        $headers = "From: " . $mittente . "\r\n";
        $headers .= "Reply-To: " . $mittente . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Usa la funzione mail di PHP
        return mail($destinatario, $oggetto, $testo, $headers);
    }
}
