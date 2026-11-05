<?php
namespace Controllers;
use Lib\Pages;
use Models\Alumno;
class AlumnoController{
    private Pages $pages;
    private Alumno $alumno;
    public function __construct()
    {
        $this->pages = new Pages();
        $this->alumno = new Alumno();
    }
    public static function index():void{
        $controller= new Self();
        $controller->mostrarAlumno($controller->alumno);
    }
    public function mostrarAlumno(Alumno $alumno):void{
        if(empty($alumno->getNombre())){
            $alumno->setNombre('Pepe');
            $alumno->setApellidos('Sanchez');
            $alumno->setDatey(2006);
        }
        $this->pages->render('alumno/mostrarAlumno',[
            'titulo' => 'Datos aluumno',
            'alumno1' => $alumno,
            'nombreCompleto' => $alumno->nombreCompleto(),
            'edad'=> $alumno->getEdad()
        ]);
    }
}