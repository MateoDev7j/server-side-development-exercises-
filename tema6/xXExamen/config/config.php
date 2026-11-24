<?php


// URL base calculada a partir de la ubicación de public/index.php.
// Funciona con php -S, con Apache en una subcarpeta y con un host virtual.
define('BASE_URL', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'], 2)), '/') . '/');
// Fichero de datos (un libro en JSON por línea)
define('RUTA_BIBLIOTECA', BASE_PATH . '/data/biblioteca.json');

// Carpeta donde se guardan las portadas (con "/" final)
//define('RUTA_IMG', BASE_PATH . '/public/img/');
define('UPLOADS_DIR', BASE_PATH . '/public/img/');
define('RUTA_IMG', BASE_URL . 'public/img/');
// Géneros permitidos
const GENEROS = ['novela', 'ciencia ficción', 'terror'];
