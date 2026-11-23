<?php
declare(strict_types=1);
namespace Models;
class Videojuego
{
    /** @param string[] $metodosPago */
    public function __construct(
        public int $id = 0,
        public string $titulo = '',
        public string $genero = '',
        public int $precio = 0, 
        public string $imagen = ''
        ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self
    {
        return new self(
        id: ($datos['id'] ?? 0),
        titulo: trim($datos['titulo'] ?? ''),
        genero: trim($datos['genero'] ?? ''),
        precio : ($datos['precio'] ?? ''),
        imagen: trim($datos['imagen'] ?? ''),
        );
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'genero' => $this->genero,
            'precio' => $this->precio,
            'imagen' => $this->imagen,
        ];
    }
}
