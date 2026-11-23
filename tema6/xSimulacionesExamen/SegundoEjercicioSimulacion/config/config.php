<?php
declare(strict_types=1);
// Controlador y acción que se ejecutan cuando la URL no indica ninguno
define('BASE_PATH', dirname(__DIR__) . '/'); 
//Direccion base del proyecto para el navegador
define('BASE_URL', '/tema6/xSimulacionesExamen/SegundoEjercicioSimulacion');
define('UPLOADS_DIR', BASE_PATH . 'public/uploads/capturas/');
define('TAM_MAX', (2 * 1024 * 1024));
define('UPLOADS_URL', BASE_URL . '/uploads/capturas'); 