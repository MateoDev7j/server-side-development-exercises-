<?php
/** LISTA BLANCA DE RUTAS: solo las URLs registradas aquí son accesibles */

use Controllers\AuthController;
use Controllers\PeliculaController;
use Controllers\UserController;
use Middlewares\AuthMiddleware;
use Core\Router;

// Raíz: lleva al catálogo (que será privado)
Router::add('get', '/', function () {
    redirect('peliculas');
});

// Públicas
//si es login por get como redirigir('login') significa que estamos
//enviandolo nosotros y lo mandamos a la funcion showLogin
Router::add('get',  'login',  [AuthController::class, 'showLogin']);
//Si es login por post, los datos se van a nuestra funcion login
Router::add('post', 'login',  [AuthController::class, 'login']);
Router::add('get',  'logout', [AuthController::class, 'logout']);

// Privadas (solo autenticados)
// Etapa 3: envolved cada una con AuthMiddleware::proteger([...])
//perfil redireccion ruta privada, significa que el inicio de sesion ha sido 
//exitoso.
Router::add('get', 'perfil',  AuthMiddleware::proteger([UserController::class,     'perfil']));
//redireccion privada solo se muestra si la sesion existe y paso login
Router::add('get', 'peliculas',AuthMiddleware::proteger([PeliculaController::class, 'index']));
//redireccion privada solo se muestra si la sesion existe y paso login
Router::add('get', 'peliculas/mias', AuthMiddleware::proteger([PeliculaController::class, 'mias']));
