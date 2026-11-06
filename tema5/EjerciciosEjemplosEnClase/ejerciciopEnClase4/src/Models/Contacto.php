<?php
declare(strict_types=1);
namespace Models;
class Contacto
{
    /** @param string[] $metodosPago */
    public function __construct(
        public string $nombre = '',
        public string $apellidos = '',
        public string $correo = '',
        public array $metodosPago=[], // Cambiado a string para mantener ceros y el '+'
        public bool $marcar = false,
        public string $foto='',
    ) {}
    /** Crea un Contacto a partir del array contacto[] del formulario */
    public static function fromArray(array $datos): self
    {
        return new self(
            nombre:      $datos['nombre'] ?? '',
            apellidos:   $datos['apellidos'] ?? '',
            correo:      $datos['correo'] ?? '',
            metodosPago:    $datos['metodosPago'] ?? [],
            marcar:   (bool)($datos['marcar'] ?? false),
            foto:    $datos['foto'] ?? '',
        );
    }
}
