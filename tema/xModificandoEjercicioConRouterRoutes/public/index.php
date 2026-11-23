<?php
declare(strict_types=1);
require_once __DIR__ . '/../autoloader.php';// O tu autoloader propio
require_once '../config/routes.php';   // Carga las rutas en Router::$routes
require_once __DIR__ . '/../src/Lib/helpers.php';
require_once '../config/config.php';
use Lib\Router;

Router::dispatch(); // Busca la ruta actual y ejecuta el controlador
