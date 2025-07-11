<?php

namespace App\services\TechnicalServiceLayer\utility;

/**
 * Utility per verificare il tipo di richiesta HTTP
 */
class UHTTPMethods
{
    // Controlla se la richiesta HTTP attuale è di tipo POST
    public static function isPost(): bool
    {
        // $_SERVER['REQUEST_METHOD'] contiene il metodo HTTP usato per la richiesta
        // Qui ritorna true se è POST, altrimenti false
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    // Controlla se la richiesta HTTP attuale è di tipo GET
    public static function isGet(): bool
    {
        // Ritorna true se il metodo della richiesta è GET, altrimenti false
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}
