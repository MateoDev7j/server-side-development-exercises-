<?php
declare(strict_types=1);
namespace Models;
class Libro
{
    /** @param string[] */
    public function __construct(
        public string $titulo = '',
        public string $autor = '',
        public string $genero = '',
        public int $anio = 0, 
        public int $paginas = 0,
        public string $portada = '',
        public int $id= 0,
        ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self{
        return new self(
            titulo: (string)($datos['titulo'] ?? ''),
            autor: (string)($datos['autor'] ?? ''),
            genero: (string)($datos['genero'] ?? ''),
            anio: (int)($datos['anio'] ?? 0),
            paginas: (int)($datos['paginas'] ?? ''),
            portada: (string)($datos['portada'] ?? ''),
            id: (int)($datos['id'] ?? 0),
        );
    }
    public function toArray(): array
    {
        return [
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'genero' => $this->genero,
            'anio' => $this->anio,
            'paginas' => $this->paginas,
            'portada' => $this->portada,
            'id' => $this->id,
        ];
    }
    
}
