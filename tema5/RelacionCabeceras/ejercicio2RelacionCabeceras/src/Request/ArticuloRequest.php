<?php
declare(strict_types=1);

namespace Request;

class ArticuloRequest
{
    private array $datos = [];
    private array $errores = [];
    private int $httpCode = 200; // Código por defecto

    public function __construct(array $consulta)
    {
        $this->sanear($consulta);
        $this->validar();
    }

    public function esValido(): bool
    {
        return $this->errores === [];
    }

    public function error(): ?string
    {
        // Retorna el primer error del array o null si no hay ninguno
        return $this->errores['id'] ?? null;
    }

    public function httpCode(): int
    {
        return $this->httpCode;
    }

    public function id(): ?int
    {
        // Si no es válido o está vacío, evitamos devolver un entero erróneo
        return $this->esValido() ? (int)$this->datos['id'] : null;
    }

    public function sanear(array $consulta): void
    {
        $this->datos = [
            'id' => isset($consulta['id']) ? trim((string)$consulta['id']) : ''
        ];
    }

    public function validar(): void
    {
        if ($this->datos['id'] === '') {
            $this->httpCode = 400;
            $this->errores['id'] = 'Por favor, introduce el identificador de un artículo.';
            return;
        }

        if (!ctype_digit($this->datos['id'])) {
            $this->httpCode = 400;
            $this->errores['id'] = 'El identificador debe ser un número entero válido.';
            return;
        }
        //EL ERRO 404 YA LO TENEMOS EN ERRORCONTROLLER
    }
}
