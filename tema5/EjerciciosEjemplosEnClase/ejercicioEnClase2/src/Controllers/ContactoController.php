<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;
use Models\Contacto;
use Request\ContactoRequest;

class ContactoController
{
    private Pages $pagina;
    public function __construct()
    {
        $this->pagina = new Pages();
    }
    /** muestra el formulario */
    public function formulario(): void
    {
        $this->pagina->render('contacto/formulario');
    }
    /** Recoge los datos y muestra el resultado */
    public function procesar(): void
    {
        // Si se entra por GET no hay datos: se muestra el formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->formulario();
            return;
        }
        //sanaer y validar
        $entrada = $_POST['contacto '] ?? [];
        $request = new ContactoRequest(is_array($entrada) ? $entrada : []);
        //Con errores: se guardan con los escrito y se vuelve al formulario
        if(!$request->esValido()){
            Session::flash('errores', $request->errores());
            Session::flash('old', $request->datos());
            $this->formulario();
        }
        // Recoger los datos
        // Recuerda que esto es peligroso y que tenemos que sanear y validad
        $contacto = Contacto::fromArray($_POST['contacto'] ?? []);
        // Mostrar el resultado (todavía no se valida ni se guarda nada)
        $this->pagina->render('contacto/resultado', ['contacto' => $contacto]);
    }
    private function redirigir(string $accion):never
    {
        header('Location : index.php?controller=contacto&action=' . $accion);
        exit;
    }
}