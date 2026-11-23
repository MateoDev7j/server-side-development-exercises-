<?php
/** LISTA BLANCA DE RUTAS: solo las URLs registradas aquí son accesibles */

use Controllers\UsuarioController;
use Controllers\HomeController;
use Lib\Router;

// Las rutas fijas van antes que las que tienen parámetros (:id)
Router::add('get', '/', [HomeController::class, 'index']);
//Router::add('get', 'contacto/nuevo', [ContactoController::class, 'formulario']);
// Este nombre sería más adecuado para esta ruta: Router::add('get', 'contacto/nuevo', [ContactoController::class, 'create']
// y lo mismo ocurre con procesar que lo modificaremos cuando tengamos la base de datos

Router::add('post', 'usuario/procesar', [UsuarioController::class, 'procesar']);
Router::add('get', 'usuario/login', [UsuarioController::class, 'login']);
//Router::add('get', 'contacto/:id', [ContactoController::class, 'show']);
//Router::add('post', 'contacto/save', [ContactoController::class, 'save']);
