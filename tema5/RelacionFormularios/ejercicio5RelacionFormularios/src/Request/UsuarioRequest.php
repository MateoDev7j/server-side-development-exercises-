<?php
declare(strict_types=1);

namespace Request;

class UsuarioRequest 
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
        $limpiar = static fn(mixed $v): string => is_string($v) ? trim(strip_tags($v)) : '';
            $this->datos = [
            'usuario'  => $limpiar($entrada['usuario'] ?? ''),
            'password' => $limpiar($entrada['password'] ?? ''), 
        ];
    }

    public function validar(): void
    {
        // Validar usuario
        if ($this->datos['usuario'] === '') {
            $this->errores['usuario'] = "El nombre de usuario es obligatorio.";
        }
        if (strlen($this->datos['usuario'])<=3){
            $this->errores['usuario'] = "El nombre de usuario tiene que tener minimo 4 caracteres.";
        }
        if(str_contains($this->datos['usuario'], ' ')){
            $this->errores['usuario'] = "El nombre de usuario no puede tener espacios en blanco.";
        }
        
        // Validar contraseña
        $patron = '/^(?=.*[A-Z]).{7,}$/';
        if ($this->datos['password'] === '') {
            $this->errores['password'] = "La contraseña es obligatoria.";
        } elseif (strlen($this->datos['password']) < 4) {
            $this->errores['password'] = "La contraseña debe tener al menos 4 caracteres.";
        } elseif(!preg_match($patron,$this->datos['password'], $matches)){
            $this->errores['password'] = "La contraseña Tiene que  tener minimo 7 caracteres y una letra mayuscula";
        }
        
    }
}