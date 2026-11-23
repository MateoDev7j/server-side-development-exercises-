<?php
declare(strict_types=1);

namespace Request;

class ContactoRequest
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
            'apellidos'   => $limpiar($entrada['apellidos'] ?? ''),
            'correo'      => $limpiar($entrada['correo'] ?? ''),
            'metodosPago' => $entrada['metodosPago'] ?? [], 
            'marcar'      => isset($entrada['marcar']) ? '1' : '0',
        ];
    }

    public function validar(): void
    {
        // Validar correo
        if ($this->datos['correo'] === '') {
            $this->errores['correo'] = "El correo es obligatorio.";
        } elseif (!filter_var($this->datos['correo'], FILTER_VALIDATE_EMAIL)) {
            $this->errores['correo'] = "El formato del correo no es válido.";
        }

        // Validar términos y condiciones
        if ($this->datos['marcar'] !== '1') {
            $this->errores['marcar'] = "Debes aceptar los terminos y condiciones.";
        }
    }
}