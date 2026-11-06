<?php
declare(strict_types=1);

namespace Controllers;

use DirectoryIterator;
use Lib\Pages;
use UnexpectedValueException;
class FicherosController{

    private Pages $pagina;

    public function __construct()
    {
        $this->pagina = new Pages();
    }
    public function procesar():void{
        $directorio = __DIR__ . '/../../public/ficheros/pruebas_directorio/';
        $origen = __DIR__ . '/../../public/ficheros/origen.txt';
        $destino = $directorio . 'copia_origen.txt';
        
        $mensajeDirectorioCreado='';
        $mensajeTextoCopiado='';
        if(!is_dir($directorio)){
            if(!mkdir($directorio,0777,true)){
                $mensajeDirectorioCreado='hubo un error al crear';
            } 
            else{
                $mensajeDirectorioCreado='Se ha creado con exito';
                
            }
            if(is_file($origen)){
                if(!copy($origen, $destino)){
                    $mensajeTextoCopiado='Error al copiar el archivo';
                }else{$mensajeTextoCopiado='Exito de copiado de archivo';}
            }else{$mensajeTextoCopiado='El archivo que intentas copiar no existe';}
        }
        else{
            $mensajeDirectorioCreado='El directorio ya existia';
        }
            $archivos=[];
                try{
                    $iterator = new DirectoryIterator($directorio);
                    foreach($iterator as $archivo){
                        if(!$archivo->isDot()){
                            $archivos[]=clone $archivo;
                        }
                    }
                }catch(UnexpectedValueException $e){
                        echo $e->getMessage();
                }
        $this->pagina->render('directorios/resultado',['archivos'=>$archivos,
                                                                'mensaje'=>$mensajeDirectorioCreado,
                                                                'mensajeCopia'=>$mensajeTextoCopiado]);
    }
}
?>