<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Incidencia;                       
use Models\RepositorioIncidencias;           
use Request\IncidenciaRequest;               
use Models\CalculadoraCoste;

class IncidenciaController
{
    private Pages $pagina;

    function __construct()
    {
        $this->pagina = new Pages();
    }

    public function resultadoIncidencia(): void
    {
        $this->pagina->render('incidencia/resultado', [
            'incidencia' => RepositorioIncidencias::todos(),
        ]);
    }

    public function nuevaIncidencia(): void
    {
        // 6: pasamos modelo vacío para que la vista pueda rellenar value=""
        $this->pagina->render('incidencia/formulario', [
            'incidencia' => new Incidencia(),
            'errores'    => [],
        ]);
    }

    public function procesar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/incidencia/nuevo');
            return;
        }

        // Tu enfoque, que es el correcto:
        $request = new IncidenciaRequest(
            $_POST['incidencia'] ?? [],   
            $_FILES['captura'] ?? []
        );

        if (!$request->esValido()) {
            $this->pagina->render('incidencia/formulario', [
                'incidencia' => Incidencia::fromArray($request->datos()),
                'errores'    => $request->errores(),
            ]);
            return;
        }
        $datos = $request->datos();
        $coste = CalculadoraCoste::calcular(
            $datos['tipo_incidencia'],
            $datos['prioridad'],
            $datos['horas'],
            $datos['tecnicos']
        );
        $nombreArchivo = bin2hex(random_bytes(8)) . '.' . $request->extension();
        if (!is_dir(UPLOADS_DIR)){
            mkdir(UPLOADS_DIR,0777,true);
        }
        move_uploaded_file($request->archivo()['tmp_name'], UPLOADS_DIR . $nombreArchivo);
        
        $incidencia = Incidencia::fromArray($request->datos());
        $incidencia->captura = $nombreArchivo;
        $incidencia->coste = $coste;
        RepositorioIncidencias::guardar($incidencia);

        $this->pagina->render('incidencia/mostrarDatos',[
            'incidencia' => $incidencia,
        ]);
    }

    public function detalle(int $id): void{
        $incidencia = RepositorioIncidencias::buscar($id);
        if ($incidencia === null) {
            \Controllers\ErrorController::show_error404();
            return;
        }
        $this->pagina->render('incidencia/detalle', ['incidencia' => $incidencia]);
    }

    // 5 y 7: sin url(), sin obtenerImagenes()
    function redirect(string $ruta): never
    {
        header('Location: ' . BASE_URL . '/' . ltrim($ruta, '/'));
        exit;
    }
}