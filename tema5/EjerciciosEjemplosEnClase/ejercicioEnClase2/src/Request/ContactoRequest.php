<?php
declare(strict_types=1);
namespace Request;
use Contacto;
use DateTime;
class ContactoRequest{
    public const array =['VISA','Mastercarad','Paypal'];
    
    private array $datos = [];

    private array $errores = [];

    public function __construct(array $entrada)
    {
        $this->sanear($entrada);
        $this->validar();
    }
    public function esValido():bool
    {
        return $this->errores===[];
    }

    public function errores():array
    {
        return $this->errores;
    }
    public function datos():array
    {
        return $this->datos;
    }
    public function sanear(array $entrada):void
    {
        $texto = static fn(mixed $v): string => is_string($v) ? trim(strip_tags($v) : '') 
    }
    public function validar():void
    {
     
    
        if($d['correo'] !== ''){

        }
        if($d['marcar'] !== '1'){
            $this->errores['marcar'] = "Debes aceptar los terminos y condiciones.";
        }
    }
}