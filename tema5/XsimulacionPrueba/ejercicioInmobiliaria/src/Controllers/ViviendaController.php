<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;
use Models\Vivienda;
use Request\ViviendaRequest;

class ViviendaController
{
    private Pages $pagina;
    public function __construct()
    {
        $this->pagina = new Pages();
    }
    /** muestra el formulario */
    public function formulario(): void
    {
        $this->pagina->render('vivienda/formulario',[
            'contacto' => new Vivienda()
        ]);
    }
    /** Recoge los datos y muestra el resultado */
    public function procesar(): void
    {
        // Si se entra por GET no hay datos: se muestra el formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('formulario');
            return;
        }
        //sanaer y validar
        $entrada = $_POST['contacto'] ?? [];
        $entrada += $_FILES['foto'] ?? [];
        $request = new ViviendaRequest(is_array($entrada) ? $entrada : []);
        //Con errores: se guardan con los escrito y se vuelve al formulario
        if(!$request->esValido()){
            //si al procesar llega aqui no lo mandamos a resultado
            //renderizamos la pagina de login con los mismos datos y 
            //los errores, asi no se pieden los datos
            $this->pagina->render('contacto/formulario', [
                'errores' => $request->errores(),
                'contacto'   => Vivienda::fromArray($request->datos()),
            ]);
            return;
        }
        //si esValido creamos el modelo con los datos ya saneados
        $contacto = Vivienda::fromArray($request->datos());
        // Mostrar el resultado (todavía no se valida ni se guarda nada)
        $this->pagina->render('contacto/resultado', ['contacto' => $contacto]);
    }
    /** Redirige a una acción del controlador de contacto */
    private function redirigir(string $accion):never
    {
        header('Location: index.php?controller=contacto&action=' . $accion);
        exit;
    }
}