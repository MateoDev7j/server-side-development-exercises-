<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;
class JsonController
{
    /*json_decode($json, true): 
    Convierte una cadena JSON en un array asociativo 
    (si el segundo parámetro es true) 
    o en objetos (si es false). Aquí usarás true.

    json_encode($array): Convierte un array de PHP en 
    una cadena JSON (por si alguna vez necesitas 
    hacer lo contrario). */
    
    private Pages $pagina;
    public function __construct()
    {
        $this->pagina = new Pages();
    }
    /** Recoge los datos y muestra el resultado */
    public function procesar(): void
    {
        $jsonInput = '[{"id": 1,"nombre":"Ana","edad":28},{"id":2,"nombre":"Luis","edad":22},{"id":3,"nombre":"Carlos","edad":30}]';
        $usuarios = json_decode($jsonInput, true);
        if($usuarios===null){
            echo 'Ha ocurrido un error en la codificacion';
            json_last_error();
            //json_last_error() te avisa el error o que fallo
        }
        else{
            //version conforeachh
            /* $mayores = [];
            foreach ($usuarios as $usuario) {
                if ($usuario['edad'] >25) {
                    $mayores[] = $usuario['nombre'];
                }   
            }*/
            //Version array_filter y array_column
            $filtrados = array_filter($usuarios, fn($u) => $u['edad'] > 25);
            //en filtrados ya tengo los usuarios mayores a 25
            //pero creo un nuevo array nombres[nombre1,nombre2]
            //que solo me daran sus nombres en un array
            $nombres = array_column($filtrados, 'nombre');
            
        }
        $this->pagina->render('json/resultado',['nombres'=>$nombres ?? []]);
    }
    
}