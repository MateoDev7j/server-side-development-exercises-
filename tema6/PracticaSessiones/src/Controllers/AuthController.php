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
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = (new UserModel())->findByEmail($email);
        // TODO: comprobar la contraseña con password_verify()
        if ($usuario !== null && password_verify($password, $usuario['hash'])) {
            Session::set('user_id', $usuario['id']);
            redirect('perfil');
        }

        redirect('login');
    }
    public function logout(): void
    {
        // TODO (Etapa 2): Session::destruir() y redirect('login')
        Session::destruir();
        redirect('login');
    }
}
