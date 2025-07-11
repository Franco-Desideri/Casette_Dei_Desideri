<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\controllers\CFrontController;

require_once __DIR__ . '/src/utils/Installation.php';
require_once __DIR__ . '/bootstrap.php';
USession::start();
Installation::install();

$frontController = new CFrontController();
$frontController->run($_SERVER['REQUEST_URI']);
