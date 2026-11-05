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

    /** Recoge los datos y muestra el resultado */
    public function procesar(): void
    {
        // Si se entra por GET no hay datos: se muestra el formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('login');
            return;
        }

        // Sanear y validar (asegúrate de que el name del form es name="usuario[...]")
        $entrada = $_POST['usuario'] ?? [];
        $request = new UsuarioRequest(is_array($entrada) ? $entrada : []);

        // Con errores: se guardan con lo escrito y se vuelve al formulario
        if (!$request->esValido()) {
            // En lugar de redirigir (que pierde datos), renderizamos la vista con errores
            $this->pagina->render('usuario/login', [
                'errores' => $request->errores(),
                'usuario'   => Usuario::fromArray($request->datos())
            ]);
            return;
        }

        // Si es válido, creamos el modelo con los datos YA saneados
        $usuario = Usuario::fromArray($request->datos());
        // Verificar si realmente existe en el sistema
        $contraseñaEncriptada=password_hash('M1234567',PASSWORD_BCRYPT); 
        $usuarioFijo=[
            'nombre'=>'Mateo' ,
            'password'=>$contraseñaEncriptada
        ];
        // Verficamos si el usuario es igual a los datos recibidos
        
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
        // Mostrar el resultado
        //$this->pagina->render('usuario/resultado', ['usuario' => $usuario]);

    }

    /** Redirige a una acción del controlador de usuario */
    private function redirigir(string $accion): void 
    {
        header('Location: index.php?controller=usuario&action=' . $accion);
        exit;
    }
}