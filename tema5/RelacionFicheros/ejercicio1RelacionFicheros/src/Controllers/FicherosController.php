<?php
declare(strict_types=1);

namespace Controllers;
use Lib\Pages;
class FicherosController{

    private Pages $pagina;

    public function __construct()
    {
        $this->pagina = new Pages();
    }
    public function pruebas():void{
        $directorio = __DIR__ . '/../../public/ficheros/'; 
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        $ficheroValido   = $directorio . 'valido.txt';
        $ficheroNoExiste = $directorio . 'no_existe.txt';
        $ficheroSinPermisos = $directorio . 'sin_permisos.txt';
        if (!file_exists($ficheroValido)) {
            file_put_contents($ficheroValido, 'Este es un archivo de prueba válido.');
        }
        if (!file_exists($ficheroSinPermisos)) {
            file_put_contents($ficheroSinPermisos, 'Este archivo no se debería poder leer.');
            chmod($ficheroSinPermisos, 0000); 
        }
        
        $resultados=[
            'valido'=>$this->abrirFicheroSiLegible($ficheroValido),
            'no-existe'=>$this->abrirFicheroSiLegible($ficheroNoExiste),
            'sin-permisos'=>$this->abrirFicheroSiLegible($ficheroSinPermisos),
        ];
        $this->pagina->render('fichero/resultado',[
            'resultados' =>$resultados
        ]);
    }
    public function abrirFicheroSiLegible(string $rutaFichero):array{
        $resultado=[];
        if(!is_file($rutaFichero)){
            return $resultado=['status'=>false,'mensaje'=>"El archivo no existe o es un directorio."];
        }
        if(!is_readable($rutaFichero)){
            return $resultado=['status'=>false,'mensaje'=>"El archivo no contiene permisos de lectura."];
        }
        $recurso= fopen($rutaFichero,"r");
        $ficheroContenido= file_get_contents($rutaFichero);
        if($recurso){
            $resultado=['status'=>true, 'data'=>$ficheroContenido];
        }
        return $resultado;
    }
}
?>