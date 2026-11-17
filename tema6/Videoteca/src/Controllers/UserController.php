<?php
declare(strict_types=1);

namespace Controllers;

use Core\Pages;
use Core\Session;
use Models\UserModel;

/** Gestiona el recurso usuario (UserModel). Aquí solo se consulta el perfil. */
final class UserController
{
    public function perfil(): void
    {
        // Solo LEE la sesión; nunca la modifica.
        $usuario = (new UserModel())->findById((int) Session::get('user_id'));

        (new Pages())->render('user/perfil', ['usuario' => $usuario]);
    }
}
