<?php
declare(strict_types=1);
namespace Models;

class CalculadoraCoste
{
    private const TABLA = [
        'Baja'    => ['Hardware' => 20, 'Software' => 18, 'Red' => 15, 'Seguridad' => 25],
        'Media'   => ['Hardware' => 30, 'Software' => 25, 'Red' => 22, 'Seguridad' => 35],
        'Alta'    => ['Hardware' => 45, 'Software' => 40, 'Red' => 38, 'Seguridad' => 55],
        'Crítica' => ['Hardware' => 60, 'Software' => 55, 'Red' => 50, 'Seguridad' => 75],
    ];

    public static function calcular(string $tipo, string $prioridad, float $horas, int $tecnicos): float
    {
        $baseHora = self::TABLA[$prioridad][$tipo] ?? 0;
        $coste = $baseHora * $horas * $tecnicos;

        if ($tipo === 'Seguridad' && $prioridad === 'Crítica') {
            $coste *= 1.15;
        }

        return round($coste, 2);
    }
}