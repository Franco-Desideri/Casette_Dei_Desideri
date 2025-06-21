<?php

class CFrontController
{
    public function run($requestUri)
    {
        // Rimuove la parte iniziale della URI e divide i segmenti
        $requestUri = trim($requestUri, '/');
        $uriParts = explode('/', $requestUri);

        array_shift($uriParts); // ignora il nome della cartella base

        $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) : 'User';
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'login';

        $controllerClass = 'C' . $controllerName;
        $controllerFile = __DIR__ . "/{$controllerClass}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (method_exists($controllerClass, $methodName)) {
                $params = array_slice($uriParts, 2);
                call_user_func_array([$controllerClass, $methodName], $params);
            } else {
                header('Location: /Casette_Dei_Desideri/User/home');
            }
        } else {
            header('Location: /Casette_Dei_Desideri/User/home');
        }
    }
}
