<?php

use App\services\TechnicalServiceLayer\utility\USession;
use App\controllers\CFrontController;

require_once __DIR__ . '/bootstrap.php';
USession::start();

$frontController = new CFrontController();
$frontController->run($_SERVER['REQUEST_URI']);
