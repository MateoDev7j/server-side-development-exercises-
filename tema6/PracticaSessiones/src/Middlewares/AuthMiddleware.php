<?php
declare(strict_types=1);

namespace Middlewares;

use Core\Session;

final class AuthMiddleware
{
    /** Envuelve una acción con el middleware (ya hecha).
     *  Equivale a ->middleware('auth') de Laravel. */
    public static function proteger(array $accion): callable
    {
        return function (...$params) use ($accion) {
            (new self())->handle();   // 1º el middleware
            $accion[0] = new $accion[0]();  // 2º el controlador
            return call_user_func_array($accion, $params);
        };
    }

    public function handle(): void
    {
        // TODO: si no existe 'user_id' en la sesión:
        //       - dejar un flash (Etapa 5): «Debes iniciar sesión para ver esta página»
        //       - redirect('login')  (ya incluye exit)
    }
}
