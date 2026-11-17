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
    public function control(): void
    {
        if(isset($_COOKIE['visitas']) && is_array($_COOKIE['visitas'])){
            $fechas = $_COOKIE['visitas'];
        } else{
            $fechas = [];
        }
        $indice = count($fechas);
        $ahora = date('Y-m-d H:i:s');
        $fechas [] = $ahora;
        setcookie("visitas[$indice]", (string) $ahora, [
        'expires' => time() + 60 * 60 * 24 * 365,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax',
        ]);
        $this->pagina->render('home/home',['visitas' => count($fechas),
                    'fechas' => array_reverse($fechas)]);
        /*$json='';
        $ruta = __DIR__ . '/../../public/datos/';
        $rutaJs = $ruta.'usuarios.json';
        if(!is_dir($ruta)){
            if(!mkdir($ruta, 0777, true)){
                echo "Fallo inesperado no se pudo crear la carpeta";
            }
        /*  $contenidoString = file_get_contents($rutaJs);
            $objetoJson = json_decode($contenidoString);
            Esto me devuelve un Objeto 
            echo $objetoJson->usuario;*/
        /*  $contenidoString = file_get_contents($rutaJs);
            $arrayAsociativo = json_decode($contenidoString, true);
            Esto me devuelve un array Asociativo
            echo $arrayAsociativo['usuario']*/
        /*}
        if(is_file($rutaJs)){
            $json = file_get_contents($rutaJs);
        }
        if($json!==''){
            $arrayTiempos=json_decode($json, true) ?? [];
        }else{
            $arrayTiempos=[];
        }
        $arrayTiempos[]=date('Y-m-d H:i:s');
        $fechasEncode = json_encode($arrayTiempos);
        file_put_contents($rutaJs, $fechasEncode);
        
        $this->pagina->render('home/home',['visitas' => $visitas,
                    'fechas' => $arrayTiempos,]);*/
        //VERSION COOCKIE MATRIZ


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