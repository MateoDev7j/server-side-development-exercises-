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
        public string $telefono = '', // Cambiado a string para mantener ceros y el '+'
        public string $situacion_laboral = '',
        public array $lenguajes = [],
        public string $url_trabajo = '',
        public bool $marcar = false,
    ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self
    {
        return new self(
            nombre:      $datos['nombre'] ?? '',
            apellidos:   $datos['apellidos'] ?? '',
            correo:      $datos['correo'] ?? '',
            telefono:     $datos['telefono'] ?? '',
            situacion_laboral:$datos['situacion_laboral'] ?? '',
            lenguajes:    $datos['lenguajes'] ?? [],
            url_trabajo:    $datos['url_trabajo'] ?? '',
            marcar:   (bool)($datos['marcar'] ?? false),
        );
    }
}
