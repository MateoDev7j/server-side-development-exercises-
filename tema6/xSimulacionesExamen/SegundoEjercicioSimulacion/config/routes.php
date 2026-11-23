<?php
/** LISTA BLANCA DE RUTAS: solo las URLs registradas aquí son accesibles */

//use Controllers\NombreController;
use Controllers\HomeController;
use Lib\Router;
use Controllers\IncidenciaController;
// Las rutas fijas van antes que las que tienen parámetros (:id)
Router::add('get', '/', [HomeController::class, 'index']);
//Router::add('get', 'contacto/nuevo', [ContactoController::class, 'formulario']);
// Este nombre sería más adecuado para esta ruta: Router::add('get', 'contacto/nuevo', [ContactoController::class, 'create']
// y lo mismo ocurre con procesar que lo modificaremos cuando tengamos la base de datos

Router::add('get', '/incidencia/nuevo', [IncidenciaController::class, 'nuevaIncidencia']);
Router::add('get', 'incidencia/resultado', [IncidenciaController::class, 'resultadoIncidencia']);
Router::add('post', '/incidencia/procesar', [IncidenciaController::class, 'procesar']);

//Router::add('post', 'contacto/procesar', [ContactoController::class, 'procesar']);
//Router::add('get', 'contacto/:id', [ContactoController::class, 'show']);
//Router::add('post', 'contacto/save', [ContactoController::class, 'save']);