<?php
    require_once 'CuentaBancaria.php';
    class CuentaAhorro extends CuentaBancaria{
        //private float $interes;
        //#[Override]
        public function __construct(protected string $titular,protected float $saldo,
                                    private float $interes)
        {
            return parent::__construct($titular);
            //$this->$interes;
        }
        public function resumen():string{
            $cadena='';
            $cadena='Titular: '.$this->titular. '| Saldo: '.$this->getSaldo().'€';
            return $cadena;
        }
        public function aplicarInteres():float {
            $this->saldo=+$this->saldo*0.2;       
            return $this->saldo;
        }
        
    }


?>