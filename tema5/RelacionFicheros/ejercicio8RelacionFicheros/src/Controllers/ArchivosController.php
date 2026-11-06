<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;
use Request\ArchivosRequest;
use DirectoryIterator;
use UnexpectedValueException;
class ArchivosController
{
    
    private Pages $pagina;
    public function __construct()
    {
        $this->pagina = new Pages();
    }
    //metodo privado para enlitar
    private function obtenerImagenes():array{
        $archivos=[];
        $directorio = __DIR__ . '/../../public/uploads/';
                try{
                    if(is_dir($directorio)){
                        $iterator = new DirectoryIterator($directorio);
                        foreach($iterator as $archivo){
                            if(!$archivo->isDot()){
                                $archivos[]=clone $archivo;
                            }
                        }
                    }else{
                        echo "No tienes imagenes subidas";
                    }
                }
                catch(UnexpectedValueException $e){
                        echo $e->getMessage();
                }
        return $archivos;
    }
    /** muestra el formulario */
    public function formulario(): void
    {
        $archivos=$this->obtenerImagenes();
        $this->pagina->render('subirImagenes/formulario',[
                                    'archivos'=>$archivos,
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
        $entrada = $_FILES['foto'] ?? [];
        $request = new ArchivosRequest(is_array($entrada) ? $entrada : []);
        //Con errores: se guardan con los escrito y se vuelve al formulario
        if(!$request->esValido()){
            //si al procesar llega aqui no lo mandamos a resultado
            //renderizamos la pagina de login con los mismos datos y 
            //los errores, asi no se pieden los datos
            $this->pagina->render('subirImagenes/formulario', [
                'errores' => $request->errores()]);
            return;
        }
        $archivos=$this->obtenerImagenes();
        $this->pagina->render('subirImagenes/formulario',['archivos'=>$archivos]);
    }
    /** Redirige a una acción del controlador de contacto */
    private function redirigir(string $accion):never
    {
        header('Location: index.php?controller=archivos&action=' . $accion);
        exit;
    }
}