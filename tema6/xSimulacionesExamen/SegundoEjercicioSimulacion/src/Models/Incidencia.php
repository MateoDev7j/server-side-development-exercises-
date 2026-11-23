<?php
declare(strict_types=1);
namespace Models;
class Incidencia
{
    /** @param string[] $metodosPago */
    public function __construct(
        public string $tipo_incidencia = '',
        public string $prioridad = '',
        public string $cliente = '',
        public string $descripcion = '', 
        public string $tecnicos = '',
        public float $horas = 0,
        public array $sistemas = [],
        public string $captura = '',
        public string $observaciones = '',
        public int $id= 0,
        public float $coste = 0,
        ) {}
    /** Crea un Contacto a partir del array contacto[...] del formulario */
    public static function fromArray(array $datos): self{
        return new self(
            tipo_incidencia: (string)($datos['tipo_incidencia'] ?? ''),
            prioridad: (string)($datos['prioridad'] ?? ''),
            cliente: (string)($datos['cliente'] ?? ''),
            descripcion: (string)($datos['descripcion'] ?? ''),
            tecnicos: (string)($datos['tecnicos'] ?? ''),
            horas: (float)($datos['horas'] ?? 0),
            sistemas: is_array($datos['sistemas'] ?? null) ? $datos['sistemas'] : [],
            captura: (string)($datos['captura'] ?? ''),
            observaciones: (string)($datos['observaciones'] ?? ''),
            id : (int)($datos['id'] ?? 0),
            coste: (float)($datos['coste'] ?? 0),
        );
    }
    public function toArray(): array
    {
        return [
            'tipo_incidencia' => $this->tipo_incidencia,
            'prioridad' => $this->prioridad,
            'cliente' => $this->cliente,
            'descripcion' => $this->descripcion,
            'tecnicos' => $this->tecnicos,
            'horas' => $this->horas,
            'sistemas' => $this->sistemas,
            'captura' => $this->captura,
            'observaciones' => $this->observaciones,
            'id' => $this->id,
            'coste' => $this->coste, 
        ];
    }
}
