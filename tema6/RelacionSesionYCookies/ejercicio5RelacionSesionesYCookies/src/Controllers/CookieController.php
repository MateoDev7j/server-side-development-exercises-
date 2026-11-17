<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Request\CookieRequest;
class CookieController
{
    private Pages $pagina;

    public function __construct()
    {
        $this->pagina = new Pages();
    }

    /** Muestra el formulario */
    public function control(): void
    {
        $accion = $_GET['accion'];
        $nombre='';
        if($accion=='crear'){
            
            //sanear y validar 
            $entrada = $_GET['cookie'] ?? [];
            $request = new CookieRequest(is_array($entrada) ? $entrada : []);
            if (!$request->esValido()) {
                //si al procesar llega aqui no lo mandamos a resultado
                //renderizamos la pagina de login con los mismos datos y 
                //los errores, asi no se pieden los datos
                $this->pagina->render('home/home', [
                    'errores' => $request->errores(),
                    'usuario' => $_COOKIE['usuario'] ?? '',
                    'mensaje' => '',
                ]);
                return;
            }
            $nombre= $request->datos()['nombre'];
            $tiempo = $request->datos()['tiempo'];
            setcookie('usuario', (string) $nombre, [
                'expires' => time() + (int) $tiempo,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                ]);
            //$this->pagina->render('home/home',['datos'=>$request->datos()]);
            $_SESSION['mensaje'] = 'Cookie creada correctamente.';
            $this->redirigir();
        }
        if($accion=='borrar'){
            setcookie('usuario', (string) $nombre, [
                'expires' => time() -1,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                ]);
                $_SESSION['mensaje'] = 'Cookie borrada correctamente.';
                $this->redirigir();
            
        }
        if($accion=='actualizarPag'){
            $this->redirigir();
        }

    }
    /** Redirige a una acción del controlador de usuario */
    private function redirigir(): void 
    {
        header('Location:'. BASE_URL);
        //redirigimos a la accion o funcion que tenemos en el controlador
        //UsuarioController y la funcion/accion sera el parametro que le pasamos
        //ejemplo login() que renderiza nuestra vista de login
        exit;
        //las cabezeras obligatoriamente tiene que tener exi; si no
        //el programa no sale de la accion
    }
}