<?php
declare(strict_types=1);

namespace Controllers;

use Core\Pages;
use Core\Session;
use Models\UserModel;

/**
 * Autenticación: comprueba credenciales y abre/cierra la sesión.
 * NO es el controlador de UserModel (para eso está UserController).
 */
final class AuthController
{
    // Etapa 5: leed los flash 'error' e 'info' con Session::getFlash()
    // y pasadlos a la vista (la vista no accede a Session).
    public function showLogin(): void
    {
        (new Pages())->render('auth/login', ['error' => null, 'info' => null]);
    }

    public function login(): void
    {
        // TODO (Etapa 2): leer 'email' y 'password' de $_POST
        // TODO: buscar el usuario con (new UserModel())->findByEmail()
        // TODO: comprobar la contraseña con password_verify()
        // TODO: si es correcta -> Session::set('user_id', ...) y redirect('perfil')
        //       (Etapa 4: llamad antes a Session::regenerar())
        // TODO: si falla -> redirect('login')
        //       (mismo comportamiento si el correo no existe que si la contraseña es incorrecta)
    }

    public function logout(): void
    {
        // TODO (Etapa 2): Session::destruir() y redirect('login')
    }
}
