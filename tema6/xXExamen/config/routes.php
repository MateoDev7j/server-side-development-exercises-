<?php
/** LISTA BLANCA DE RUTAS: solo las URLs registradas aquí son accesibles */

use Controllers\LibroController;
use Core\Pages;
use Core\Router;

// Raíz: comprobación del entorno (ya hecho, no forma parte del examen)
Router::add('get', '/', function () {
    new Pages()->render('inicio');
});


Router::add('get',  'libros/nuevo', [LibroController::class, 'create']);
Router::add('post', 'libros',       [LibroController::class, 'store']);
Router::add('get',  'libros',       [LibroController::class, 'index']);
