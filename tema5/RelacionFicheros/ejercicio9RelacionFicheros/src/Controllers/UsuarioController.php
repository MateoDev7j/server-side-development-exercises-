<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Usuario;
use Request\UsuarioRequest;

use function PHPUnit\Framework\assertTrue;

class UsuarioController
{
    private Pages $pagina;

    public function __construct()
    {
        $this->pagina = new Pages();
    }

    /** Muestra el formulario */
    public function login(): void
    {
        echo "Entrando al formulario de login...";
        $this->pagina->render('usuario/login',[
            'usuario' => new Usuario()
        ]);
    }

    /**recoge los datos y muestra el resultado */
    public function procesar(): void
    {
        //si se entra por GET no hay datos: se muestra el formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('login');
            return;
        }

        //sanear y validar 
        $entrada = $_POST['usuario'] ?? [];
        $request = new UsuarioRequest(is_array($entrada) ? $entrada : []);

        //si no pasa nuestra funcion de request esValido 
        //mandamos los errores en nuestro array de informacion
        if (!$request->esValido()) {
            //si al procesar llega aqui no lo mandamos a resultado
            //renderizamos la pagina de login con los mismos datos y 
            //los errores, asi no se pieden los datos
            $this->pagina->render('usuario/login', [
                'errores' => $request->errores(),
                'usuario'   => Usuario::fromArray($request->datos())
            ]);
            return;
        }
        //si esValido creamos el modelo con los datos ya saneados
        $usuario = Usuario::fromArray($request->datos());
        //APARTADO NUEVO LEE ARCHIVOS JSON
        $json='';
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
        }
        if(is_file($rutaJs)){
            $json = file_get_contents($rutaJs);
        }
        if($json!==''){
            $usuariosJson=json_decode($json, true);
        }else{
            $usuariosJson=[];
        }
        $usuariosJson[]=$request->datos();
        $usuariosEncode = json_encode($usuariosJson);
        file_put_contents($rutaJs, $usuariosEncode);
    
        //Mostramos resultado 
        $this->pagina->render('usuario/resultado', ['usuario' => $usuario,
                                                        'mensaje' => '',
                                                        'usuarios'=>$usuariosJson,
                                                        'passwordValida'=>true]);
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