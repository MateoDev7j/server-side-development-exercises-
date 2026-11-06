<?php
declare(strict_types=1);

namespace Models;

class Articulo
{
    private static array $articulos = [
        1 => ['id' => 1, 'nombre' => 'Teclado Mecánico', 'descripcion' => 'Teclado RGB con switches red.', 'precio' => 79.99],
        42 => ['id' => 42, 'nombre' => 'Ratón Gaming', 'descripcion' => 'Ratón ergonómico de 16000 DPI.', 'precio' => 45.50],
        99 => ['id' => 99, 'nombre' => 'Monitor 4K', 'descripcion' => 'Pantalla IPS de 27 pulgadas.', 'precio' => 299.99]
    ];

    public int $id;
    public string $nombre;
    public string $descripcion;
    public float $precio;

    public function __construct(int $id, string $nombre, string $descripcion, float $precio)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }
    public static function buscarPorId(int $id): ?self
    {
        if (!isset(self::$articulos[$id])) {
            return null; 
        }

        $datos = self::$articulos[$id];
        return new self($datos['id'], $datos['nombre'], $datos['descripcion'], $datos['precio']);
    }
}
