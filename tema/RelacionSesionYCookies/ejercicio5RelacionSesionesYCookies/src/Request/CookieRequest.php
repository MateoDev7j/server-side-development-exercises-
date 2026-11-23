<?php
declare(strict_types=1);

namespace Request;

class CookieRequest
{
    private array $datos = [];
    private array $errores = [];

    public function __construct(array $entrada)
    {
        $this->sanear($entrada);
        $this->validar();
    }

    public function esValido(): bool
    {
        return $this->errores === [];
    }

    public function errores(): array
    {
        return $this->errores;
    }

    public function datos(): array
    {
        return $this->datos;
    }

    public function sanear(array $entrada): void
    {
        // Función flecha para limpiar strings
        $limpiar = static fn(mixed $v): string => is_string($v) ? trim(strip_tags($v)) : '';

        $this->datos = [
            'nombre'      => $limpiar($entrada['nombre'] ?? ''),
            'tiempo'   => $limpiar($entrada['tiempo'] ?? ''),
        ];
    }

    public function validar(): void
    {
        // Nombre obligatorio
        if ($this->datos['nombre'] === '') {
            $this->errores['nombre'] = "El nombre es obligatorio.";
        } 

        
        if ($this->datos['tiempo'] === '') {
            $this->errores['tiempo'] = "El tiempo es obligatorio.";
        }
    }
}