<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Utility per accedere a informazioni del server
 */
class UServer
{
    // Restituisce l'indirizzo IP del client che ha fatto la richiesta
    public static function getClientIp(): string
    {
        // $_SERVER['REMOTE_ADDR'] contiene l'IP del client; se non presente ritorna '0.0.0.0'
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    // Restituisce l'host della richiesta HTTP (es. www.example.com)
    public static function getHost(): string
    {
        // $_SERVER['HTTP_HOST'] contiene l'host richiesto; se non presente ritorna 'localhost'
        return $_SERVER['HTTP_HOST'] ?? 'localhost';
    }

    // Restituisce l'user agent, cioè informazioni sul browser o client HTTP
    public static function getUserAgent(): string
    {
        // $_SERVER['HTTP_USER_AGENT'] contiene info sul browser; se non presente ritorna stringa vuota
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    // Restituisce il metodo HTTP usato per la richiesta (es. GET, POST, PUT...)
    public static function getMethod(): string
    {
        // $_SERVER['REQUEST_METHOD'] contiene il metodo; se non presente ritorna 'GET' come default
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
}

