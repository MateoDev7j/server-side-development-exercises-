<?php
/** LISTA BLANCA DE RUTAS: solo las URLs registradas aquí son accesibles */

//use Controllers\NombreController;
use Controllers\HomeController;
use Controllers\VideojuegoController;
use Lib\Router;

// Las rutas fijas van antes que las que tienen parámetros (:id)
Router::add('get', '/', [HomeController::class, 'index']);
//Router::add('get', 'contacto/nuevo', [ContactoController::class, 'formulario']);
// Este nombre sería más adecuado para esta ruta: Router::add('get', 'contacto/nuevo', [ContactoController::class, 'create']
// y lo mismo ocurre con procesar que lo modificaremos cuando tengamos la base de datos
Router::add('GET', '/videojuego/lista', [VideojuegoController::class, 'listaJuegos']);
Router::add('GET', '/videojuego/nuevo', [VideojuegoController::class, 'nuevoVideojuego']);
Router::add('post', 'videojuego/procesar', [VideojuegoController::class, 'procesar']);