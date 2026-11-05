<?php
declare(strict_types=1);

// 1. Cargamos el Autoloader
require_once __DIR__ . '/../autoloader.php'; 

// 2. Cargamos el archivo de configuración (¡Ojo con la ruta y las mayúsculas!)
require_once __DIR__ . '/../config/config.php';

use Controllers\FrontController;


FrontController::main();



/*
// 3. Las importaciones (use) solo se usan para clases, interfaces o traits.
//    Las constantes (define) NO se importan con 'use'. 
//    Pero como hemos hecho el require_once del paso 2, ya están disponibles.
//    Aun así, si quieres usar la clase BarajaController, sí debes importarla:
use Controllers\BarajaController;
$controladorNombreError = 'Controllers\\' . 'Error' . 'Controller';
$controladorError = new $controladorNombreError();
$controladorError->show_error404(404);
// 4. Preparamos el nombre del controlador y la acción
$controladorNombre = 'Controllers\\' . CONTROLLER_DEFAULT . 'Controller';
$accionNombre = ACTION_DEFAULT;

// 5. Verificamos y ejecutamos
if (class_exists($controladorNombre) && method_exists($controladorNombre, $accionNombre)){
    $controlador = new $controladorNombre(); // Crea el BarajaController
    $controlador->$accionNombre();           // Llama a muestraBaraja()
} else {
    echo "Error 404: El controlador o la acción no existen.";
}
$controladorBarajaSinBarajar = new $controladorNombre();
$controladorBarajaSinBarajar->muestraBaraja();



use Enums\Palo;
use Enums\Valor;
use Models\Baraja;
use Models\Carta;

//Creamos una carta

$carta = new Carta(Valor::As, Palo::Oros);
echo "carta: $carta <br>";
echo "Numero: {$carta->getNumero()}<br>"; 
echo "Palo: {$carta->getPalo()->value}<br>";
echo "Imagen: {$carta->getNombreImagen()}<br><br>";
echo "<img src='assets/img/{$carta->getNombreImagen()}'><br>";

//Creamos Baraja
$baraja = new Baraja();
echo "Cartas al crear baraja: {$baraja->totalCartas()}<br>";

$cartas = $baraja->getCartas();
echo "Primera: {$cartas[0]} <br>"; 
$ultimoIndice = array_key_last($cartas); 
echo "Ultima: {$cartas[$ultimoIndice]}<br><br>";

//Barajamos
$baraja->barajar();
$cartas = $baraja->getCartas();
echo "Primera carta despues de barajar: {$cartas[0]}<br><br>";

//Sacamos tres cartas 
for($i=1; $i<=3; $i++){
    $sacada = $baraja->sacarCarta();
    echo "Carta $i: $sacada (quedan {$baraja->totalCartas()})<br>";
}

//Vaciar la baraja y comprobar que devuelve null
while ($baraja->totalCartas() > 0){
    $baraja->sacarCarta();
}
echo "<br>Cartas restantes: {$baraja->totalCartas()}"; //0
var_dump($baraja->sacarCarta()); //NULL
echo "**********************************************************************";
echo "*************************PRUEBAS**************************************";
echo "**********************************************************************";
$barajaPruebas = new Baraja();
echo "Cartas al crear baraja: {$barajaPruebas->totalCartas()}<br>";
print_r($barajaPruebas);
echo "Barajamos la baraja";
*/
