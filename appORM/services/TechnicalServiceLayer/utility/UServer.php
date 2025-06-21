<?php

/**
 * Utility per accedere a informazioni del server
 */
class UServer
{
    // Restituisce l'indirizzo IP del client
    public static function getClientIp(): string
    {
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    // Restituisce l'host della richiesta
    public static function getHost(): string
    {
        return $_SERVER['HTTP_HOST'] ?? 'localhost';
    }

    // Restituisce l'user agent (browser client)
    public static function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    // Restituisce il metodo HTTP della richiesta
    public static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
}
