<?php
/** LISTA BLANCA DE RUTAS: solo las URLs registradas aquí son accesibles */

use Controllers\AuthController;
use Controllers\PeliculaController;
use Controllers\UserController;
use Core\Router;

// Raíz: lleva al catálogo (que será privado)
Router::add('get', '/', function () {
    redirect('peliculas');
});

// Públicas
Router::add('get',  'login',  [AuthController::class, 'showLogin']);
Router::add('post', 'login',  [AuthController::class, 'login']);
Router::add('get',  'logout', [AuthController::class, 'logout']);

// Privadas (solo autenticados)
// Etapa 3: envolved cada una con AuthMiddleware::proteger([...])
Router::add('get', 'perfil',         [UserController::class,     'perfil']);
Router::add('get', 'peliculas',      [PeliculaController::class, 'index']);
Router::add('get', 'peliculas/mias', [PeliculaController::class, 'mias']);
