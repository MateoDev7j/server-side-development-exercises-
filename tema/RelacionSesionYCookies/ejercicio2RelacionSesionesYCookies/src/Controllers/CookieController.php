<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;

class CookieController
{
    private Pages $pagina;

    public function __construct()
    {
        $this->pagina = new Pages();
    }

    /** Muestra el formulario */
    public function index(): void
    {
        $idioma = $_COOKIE['idioma'] ?? 'es';
        if (isset($_GET['idioma'])) {
            $idiomaGet = $_GET['idioma'];
            if($idiomaGet==='es'){
                $idioma = 'es';
                setcookie('idioma', (string) $idioma, [
                'expires' => time() + 60 * 60 * 24 * 365,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                ]);
            }
            if($idiomaGet==='en'){
                $idioma = 'en';
                setcookie('idioma', (string) $idioma, [
                'expires' => time() + 60 * 60 * 24 * 365,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                ]);
            }
        }
        
        
        $this->pagina->render('cookie/cookie_idioma',['idioma' => $idioma]);

    }

    

    /** Redirige a una acción del controlador de usuario */
    private function redirigir(string $accion): void 
    {
        header('Location: index.php?controller=usuario&action=' . $accion);
        //redirigimos a la accion o funcion que tenemos en el controlador
        //UsuarioController y la funcion/accion sera el parametro que le pasamos
        //ejemplo login() que renderiza nuestra vista de login
        exit;
        //las cabezeras obligatoriamente tiene que tener exi; si no
        //el programa no sale de la accion
    }
}