<?php

namespace App\controllers;

/**
 * CFrontController
 * 
 * Questo controller gestisce l'instradamento delle richieste in arrivo,
 * interpretando la URI e caricando dinamicamente il controller, metodo
 * e parametri richiesti.
 */
class CFrontController
{
    /**
     * Esegue il controller e metodo corretti in base alla richiesta.
     * 
     * @param string $requestUri L'URI richiesta (es. "/Admin/lista/5")
     */
    public function run($requestUri)
    {
        // Percorso di base da rimuovere dall'URI (es. se progetto è in sottocartella)
        $basePath = 'Casette_Dei_Desideri/';

        // Rimuove il path base dall'URI (se presente)
        if (strpos($requestUri, $basePath) !== false) {
            $requestUri = str_replace($basePath, '', $requestUri);
        }

        // Rimuove eventuali slash iniziali/finali
        $requestUri = trim($requestUri, '/');

        // Divide l'URI in parti (es. ["Admin", "lista", "5"])
        $uriParts = explode('/', $requestUri);

        // Imposta controller e metodo di default (fallback: CUser->home)
        $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) : 'User';
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'home';

        // Costruisce il nome della classe controller (es. "CAdmin")
        $controllerClass = 'C' . $controllerName;

        // Percorso fisico al file del controller
        $controllerFile = __DIR__ . "/{$controllerClass}.php";

        // Verifica che il file del controller esista
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Verifica che la classe esista e possa essere istanziata
            if (class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();

                // Verifica che il metodo richiesto esista
                if (method_exists($controllerInstance, $methodName)) {
                    // Prende tutti i parametri in eccesso (dopo controller/metodo)
                    $params = array_slice($uriParts, 2);

                    // Chiama il metodo, passando i parametri
                    call_user_func_array([$controllerInstance, $methodName], $params);
                    return;
                }
            }
        }

        // Fallback: se qualcosa va storto, redirect alla home utente
        header('Location: /Casette_Dei_Desideri/User/home');
    }
}
