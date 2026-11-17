<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;

class HomeController{
    private Pages $pagina;

    function __construct(){
        $this->pagina = new Pages();
    }
    public function index(){
        /** Muestra la vista */
/*
        $visitas = (int) ($_COOKIE['visitas'] ?? 0) + 1;
        setcookie('visitas', (string) $visitas, [
        'expires' => time() + 60 * 60 * 24 * 365,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax',
        ]);
        $arrayTiempos[]=date('Y-m-d H:i:s');
        $this->pagina->render('home/home',['visitas' => $visitas,
                    'fechas' => $arrayTiempos,]);*/
        $this->pagina->render('home/home');
    
    }
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