<?php
declare(strict_types=1);
namespace Models;
use Models\Libro;
class LibroRepositorio{
    public function __construct(){}
    public function getAll():array{
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        if(!isset($_SESSION['libros_simulados'])){
            $_SESSION['libros_simulados']=[
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio(),
                $this->generarLibroAleatorio()
            ];
        
        }
        return $_SESSION['libros_simulados'];
    }
    public function generarLibroAleatorio():Libro{
        $titulos = ["Sin noticias de Gurb","Cómo mandar a la gente al carajo","Maldito Karma","Tres hombres en una barca"];
        $disponibles=["disponible","no-disponble"];
        $libroAleatorio = new Libro(((string)rand(1,999)),$titulos[array_rand($titulos)],(string)rand(1,99),$disponibles[array_rand($disponibles)]);       
        return $libroAleatorio;
    }
}