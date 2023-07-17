<?php 

define('ROOT', dirname(dirname(__FILE__)));

// Chargement de l'Autoloader

require_once ROOT . "/app/Autoload.php";
App\Autoload::register();

$router = require_once ROOT . '/routes/routes.php';
$router->resolve();
