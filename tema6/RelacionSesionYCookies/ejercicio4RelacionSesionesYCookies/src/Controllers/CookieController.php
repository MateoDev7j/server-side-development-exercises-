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
    public function aceptarPolitica(): void
    {
        $estado = $_COOKIE['politica'] ?? 'no-aceptado';
        if (isset($_GET['politica'])) {
            $politicaGet = $_GET['politica'];
            if($politicaGet==='aceptado'){
                $estado = 'aceptado';
                setcookie('politica', (string) $estado, [
                'expires' => time() + 60 * 60 * 24 * 365,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                ]);
            }
            if($politicaGet==='no-aceptado'){
                $estado = 'no-aceptado';
                setcookie('politica', (string) $estado, [
                'expires' => time() + 60 * 60 * 24 * 365,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                ]);
            }
        }
        
        
        $this->pagina->render('cookie/cookie_politica',['politica' => $estado]);

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