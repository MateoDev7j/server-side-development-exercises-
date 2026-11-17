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
        $nombreCookie= $_COOKIE['usuario'] ?? '';
        $mensaje = $_SESSION['mensaje'] ?? '';
        unset($_SESSION['mensaje']); // Lo borras para que al refrescar (F5) desaparezca
        $this->pagina->render('home/home',['usuario'=>$nombreCookie,
                                            'mensaje'=>$mensaje,]);
    }
}