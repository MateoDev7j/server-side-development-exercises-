<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Usuario;
use Request\UsuarioRequest;

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
        //verificar si existe en el sistema simulando una base de datos
        //con un usuario fijo usuario Mateo y contraseña M1234567
        $contraseñaEncriptada=password_hash('M1234567',PASSWORD_BCRYPT); 
        $usuarioFijo=[
            'nombre'=>'Mateo' ,
            'password'=>$contraseñaEncriptada
        ];
        //Verificamos si el usuario fijo es igual a los datos recibidos
        if($usuarioFijo['nombre'] === $usuario->nombre
        && password_verify($usuario->password, $contraseñaEncriptada)){
            //Mostramos resultado si es igual a el usuario fijo
            $this->pagina->render('usuario/resultado', ['usuario' => $usuario,
                                                        'mensaje' => '',
                                                        'passwordValida'=>true]);
        }
        else{
            $this->pagina->render('usuario/resultado', ['usuario' => $usuario,
                                                        'mensaje' => "El usuario no esta en el sistema",
                                                        'passwordValida'=>false]);
        }
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