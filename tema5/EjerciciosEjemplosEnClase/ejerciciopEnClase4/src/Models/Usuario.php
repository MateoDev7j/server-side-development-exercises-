<?php
declare(strict_types=1);
namespace Models;
class Usuario
{
    /** @param string[] $metodosPago */
    public function __construct(
        public string $nombre = '',
        public string $password = '',
        ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self
    {
        return new self(
        nombre: trim($datos['usuario'] ?? ''),
        password: trim($datos['password'] ?? ''),
        );
    }
}
