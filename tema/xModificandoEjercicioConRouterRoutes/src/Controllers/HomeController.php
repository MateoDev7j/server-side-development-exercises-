<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;
use Models\Usuario;
class HomeController{
    private Pages $pagina;

    function __construct(){
        $this->pagina = new Pages();
    }
    public function index(){
        /** Muestra el formulario */
    
        $this->pagina->render('usuario/login',[
            'usuario' => new Usuario()
        ]);
    
    }
}