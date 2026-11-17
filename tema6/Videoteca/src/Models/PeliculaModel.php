<?php
declare(strict_types=1);

namespace Models;

/** Películas de la videoteca. Sin base de datos: un array con forma de tabla. */
class PeliculaModel
{
    private const PELICULAS = [
        ['id' => 1, 'titulo' => 'Matrix',       'anio' => 1999, 'user_id' => 1],
        ['id' => 2, 'titulo' => 'Amélie',       'anio' => 2001, 'user_id' => 1],
        ['id' => 3, 'titulo' => 'Interstellar', 'anio' => 2014, 'user_id' => 1],
        ['id' => 4, 'titulo' => 'Gladiator',    'anio' => 2000, 'user_id' => 2],
        ['id' => 5, 'titulo' => 'Coco',         'anio' => 2017, 'user_id' => 2],
        ['id' => 6, 'titulo' => 'El Padrino',   'anio' => 1972, 'user_id' => 2],
    ];

    /** Todas las películas del catálogo. */
    public function all(): array
    {
        return self::PELICULAS;
    }

    /** Solo las películas de un usuario. */
    public function allByUser(int $userId): array
    {
        return array_values(array_filter(
            self::PELICULAS,
            fn(array $p): bool => $p['user_id'] === $userId
        ));
    }
}
