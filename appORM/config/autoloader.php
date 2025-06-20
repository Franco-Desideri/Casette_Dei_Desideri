<?php

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/../';

    $folders = [
        'controllers',
        'models',
        'services/TechnicalServiceLayer/foundation',
        'services/TechnicalServiceLayer/utility',
    ];

    foreach ($folders as $folder) {
        $file = $baseDir . $folder . '/' . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    // Optional: fallback or error
    // throw new Exception("Classe non trovata: $className");
});
