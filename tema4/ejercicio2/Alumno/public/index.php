<?php
declare(strict_types=1);

// 1. Cargamos el Autoloader
require_once __DIR__ . '/../autoloader.php';

use Controllers\AlumnoController;

AlumnoController::index();