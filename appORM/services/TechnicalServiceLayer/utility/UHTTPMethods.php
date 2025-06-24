<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Utility per verificare il tipo di richiesta HTTP
 */
class UHTTPMethods
{
    // Verifica se la richiesta corrente è POST
    public static function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    // Verifica se la richiesta corrente è GET
    public static function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}
