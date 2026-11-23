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
    
        $this->pagina->render('home/home');
    
    }
    /** Redirige a una ruta interna y detiene el script (ya incluye exit). */
    function redirect(string $ruta): never
    {
        header('Location: ' . url($ruta));
        exit;
    }
}