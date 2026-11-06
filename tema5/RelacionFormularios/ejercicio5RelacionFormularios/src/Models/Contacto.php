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
        public array $metodosPago = [],
        public bool $marcar = false,
    ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self
    {
        return new self(
        nombre: trim($datos['nombre'] ?? ''),
        apellidos: trim($datos['apellidos'] ?? ''),
        correo: trim($datos['correo'] ?? ''),
        metodosPago: $datos['metodosPago'] ?? [],
        marcar: isset($datos['marcar']),
        );
    }
}
