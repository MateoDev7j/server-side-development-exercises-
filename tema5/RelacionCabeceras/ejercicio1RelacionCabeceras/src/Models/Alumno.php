<?php
declare(strict_types=1);
namespace MOdels;
class Alumno{
    private static array $alumnos=[
        1=>['nombre'=>'Juan','apellidos'=>'Ortiz', 'nota'=>8.5],
        2=>['nombre'=>'Pepe','apellidos'=>'Perez', 'nota'=>6.7],
        3=>['nombre'=>'Marcos','apellidos'=>'Alvarez', 'nota'=>5.7],

    ];
    public string $nombre;
    public string $apellidos;
    public float $nota;
    public function __construct(string $nombre, string $apellidos, float $nota)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->nota = $nota;
    }
}
?>