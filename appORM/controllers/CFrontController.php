<?php

namespace App\controllers;

class CFrontController
{
    public function run($requestUri)
    {
        // Definisce il path base del progetto (es. cartella root)
        $basePath = 'Casette_Dei_Desideri/';

        // Rimuove il path base se presente
        if (strpos($requestUri, $basePath) !== false) {
            $requestUri = str_replace($basePath, '', $requestUri);
        }

        // Pulisce la URI da slash iniziali/finali
        $requestUri = trim($requestUri, '/');

        // Divide la URI nei suoi segmenti
        $uriParts = explode('/', $requestUri);

        // Controller e metodo di default
        $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) : 'User';
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'login';

        $controllerClass = 'C' . $controllerName;
        $controllerFile = __DIR__ . "/{$controllerClass}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();

                if (method_exists($controllerInstance, $methodName)) {
                    $params = array_slice($uriParts, 2);
                    call_user_func_array([$controllerInstance, $methodName], $params);
                    return;
                }
            }
        }

        // Redirect fallback in caso di errori
        header('Location: /Casette_Dei_Desideri/User/home');
    }
}
