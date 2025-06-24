<?php

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/../';

    $folders = [
        'controllers',
        'models',
        'views',
        'services/TechnicalServiceLayer/foundation',
        'services/TechnicalServiceLayer/utility',
        'utility',
    ];

    foreach ($folders as $folder) {
        $file = $baseDir . $folder . '/' . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    // Estensione: supporta classi in appORM/
    $appOrmFile = $baseDir . 'appORM/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($appOrmFile)) {
        require_once $appOrmFile;
        return;
    }

    // Fallback
    // throw new Exception("Classe non trovata: $className");
});
