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
        $limpiarText = static fn(mixed $v): string => 
        is_string($v) ? trim(strip_tags($v)) : '';
        
        $limpiarTelf = static fn(mixed $v): string => 
        is_string($v) || is_numeric($v) ? preg_replace('/[^0-9+]/', '', (string)$v) : '';

        $limpiarEmail = static fn(mixed $v): string => 
        is_string($v) ? filter_var(trim($v), FILTER_SANITIZE_EMAIL): '';

        $limpiarUrl = static fn(mixed $v): string => 
        is_string($v) ? filter_var(trim($v), FILTER_SANITIZE_URL): '';

        $limpiarArray = static function(mixed $v) use ($limpiarText): array {
            if (!is_array($v)) return [];
            return array_filter(array_map($limpiarText, $v));
        };
        $this->datos = [
            'nombre'            => $limpiarText($entrada['nombre'] ?? ''),
            'apellidos'         => $limpiarText($entrada['apellidos'] ?? ''),
            'correo'            => $limpiarEmail($entrada['correo'] ?? ''),
            'telefono'          => $limpiarTelf($entrada['telefono'] ?? ''), 
            'situacion_laboral' => $limpiarText($entrada['situacion_laboral'] ?? ''),
            'lenguajes'         => $limpiarArray($entrada['lenguajes'] ?? []),
            'url_trabajo'       => $limpiarUrl($entrada['url_trabajo'] ?? ''),
            'marcar'            => isset($entrada['marcar']), 
        ];
    }

    public function validar(): void
    {
        //validar correo
        if ($this->datos['correo'] === '') {
            $this->errores['correo'] = "El correo es obligatorio.";
        } elseif (!filter_var($this->datos['correo'], FILTER_VALIDATE_EMAIL)) {
            $this->errores['correo'] = "El formato del correo no es válido.";
        }

        // VALIDAMOS URL USANDO FUNCIONES GLOBALES
        if ($this->datos['url_trabajo'] !== '' && !filter_var($this->datos['url_trabajo'], FILTER_VALIDATE_URL)) {
            $this->errores['url_trabajo'] = "La URL introducida no tiene un formato válido.";
        }

        // VALIDAMOS TELEFONO MINIMO 9 DIGITOS EN ESTE CASO CARACTERES AL TRATARLO COMOS TRING
        if ($this->datos['telefono'] !== '' && strlen($this->datos['telefono']) < 9) {
            $this->errores['telefono'] = "El telEfono debe tener al menos 9 dígitos.";
        }

        // VALIDAMOS NOMBRE Y SITUACION LABORAL QUE DEBEN SER OBLIGATIROS
        if ($this->datos['nombre'] === '') {
            $this->errores['nombre'] = "El nombre es obligatorio.";
        }
        if ($this->datos['situacion_laboral'] === '') {
            $this->errores['situacion_laboral'] = "Debes seleccionar tu situación laboral actual.";
        }

        // VALIDAMOS QUE HAYA ACEPTADO LOS TERMINOS Y CONDICIONES
        if ($this->datos['marcar'] !== true) {
            $this->errores['marcar'] = "Debes aceptar los términos y condiciones.";
        }
    }
}