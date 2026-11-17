<?php
declare(strict_types=1);
namespace Models;
class Vivienda
{
    /** @param string[] $metodosPago */
    public function __construct(
        public string $tipoVivienda = '',
        public string $zona = '',
        public string $direccion = '',
        public string $numDormitorios = '', 
        public string $precio = '',
        public string $tamano = '',
        public array $extras = [],
        public string $foto ='',
        public string $observaciones = '',
    ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self
    {
        return new self(
            tipoVivienda:      $datos['tipoVivienda'] ?? '',
            zona:   $datos['zona'] ?? '',
            direccion:      $datos['direccion'] ?? '',
            numDormitorios:     $datos['numDormitorios'] ?? '',
            precio:             $datos['precio'] ?? 0,
            tamano:    $datos['tamano'] ?? '',
            extras:    $datos['extras'] ?? [],
            foto:    $datos['foto'] ?? '',
            observaciones:    $datos['observaciones'] ?? '',
        );
    }
}
