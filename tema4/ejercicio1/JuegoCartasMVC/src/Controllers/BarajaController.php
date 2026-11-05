<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Baraja;
use Models\Carta;

class BarajaController{
    private Pages $pages;
    private Baraja $baraja;

    function __construct()
    {
        $this->pages = new Pages();
        $this->baraja= new Baraja();
    }
    public function muestraBaraja() : void{
        $this->mostrarCartas($this->baraja->getCartas(), 'Baraja mezclada');
    }

    public function barajar():void {
        $this->baraja->barajar();

        $this->mostrarCartas($this->baraja->getCartas(), 'Baraja mezclada');
    }

    private function mostrarCartas(array $cartas, string $titulo):void{
        $this->pages->render('baraja/muestraBaraja',[
            'cartas' => $cartas,
            'titulo' => $titulo,
        ]);
    }
    /*
    public function muestraBaraja(): void {
    // 1. Pide los datos al Modelo
    $cartas = $this->baraja->getCartas(); 
    
    // 2. Prepara los datos para la Vista
    $datos = ['titulo' => 'Mi Baraja', 'cartas' => $cartas];
    
    // 3. Manda a Pages que renderice
    $this->pages->render('Baraja/muestraBaraja', $datos);
}
    */

}