<?php
declare(strict_types=1);

namespace Enums;

enum Valor: int
{
    case As = 1;
    case Dos = 2;
    case Tres = 3;
    case Cuatro = 4;
    case Cinco = 5;
    case Seis =6;
    case Siete =7;
    case Ocho = 8;
    case Nueve =9;
    case Sota =10;
    case Caballo =11;
    case Rey =12;

    public function nombre() : string{
        return strtolower($this->name);
    }
}