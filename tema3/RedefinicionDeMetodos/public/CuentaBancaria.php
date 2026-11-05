<?php
class CuentaBancaria{
    //protected string $titular;
    private float $saldo=0;
    public function __construct(protected string $titular)
                                //private float $saldo)
    {
        //$this->titular=$titular;
    }
    public function getSaldo():float{
        return $this->saldo;
    }
    public function setSaldo(float $cantidad):void{
        $this->saldo=$cantidad;
    }
    public function ingresar(float $cantidad):float {
        try{
            if($cantidad<0){
                throw new Exception("No se puede aceptar numeros negativos");
            }
            else{
                $this->saldo=+$cantidad;
            }
        }catch(Exception $f){
            echo $f->getMessage();
        }
            return $this->saldo;
    }
    public function retirar(float $cantidad):float {
        try{
            if($cantidad<0 && $this->saldo < $cantidad){
                throw new Exception("hubo un problema con la cantidad");
            }
            else{
                $this->saldo=-$cantidad;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $this->saldo;
    }
}
?>