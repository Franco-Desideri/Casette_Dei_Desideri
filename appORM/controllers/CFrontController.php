<?php

namespace App\controllers;

class CFrontController
{
    public function run($requestUri)
    {
        // Rimuove la parte iniziale della URL e divide i segmenti
        $requestUri = trim($requestUri, '/');
        $uriParts = explode('/', $requestUri);

        array_shift($uriParts); // ignora il nome della cartella base

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
                } else {
                    header('Location: /Casette_Dei_Desideri/User/home');
                }
            } else {
                header('Location: /Casette_Dei_Desideri/User/home');
            }
        } else {
            header('Location: /Casette_Dei_Desideri/User/home');
        }
    }
}
