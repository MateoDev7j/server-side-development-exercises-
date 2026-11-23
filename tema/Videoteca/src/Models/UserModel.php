<?php
declare(strict_types=1);

namespace Models;

/** Usuarios de la aplicación. Sin base de datos: un array con forma de tabla. */
class UserModel
{
    // Contraseña de ambos usuarios: 1234 (guardada como hash)
    private const USERS = [
        'ana@aula.es'  => ['id' => 1, 'nombre' => 'Ana',  'email' => 'ana@aula.es',  'hash' => '$2y$10$wA7QW7rIufCaYPVs.g/NMuXQ42NZiQ3PIeqWokn7xVdQYXQ8Eo.2y'],
        'luis@aula.es' => ['id' => 2, 'nombre' => 'Luis', 'email' => 'luis@aula.es', 'hash' => '$2y$10$kaiUbNGjDMYoW07m/XVBqu3ySDjhMa7v3NlMWh08SgTEVdditLek6'],
    ];

    public function findByEmail(string $email): ?array
    {
        return self::USERS[$email] ?? null;
    }

    public function findById(int $id): ?array
    {
        foreach (self::USERS as $user) {
            if ($user['id'] === $id) {
                return $user;
            }
        }
        return null;
    }
}
