<?php
declare(strict_types=1);
namespace Models;
use Models\Autor;
class AutorRepositorio{
    public function __construct(){}
    public function getAll():array{
        $array=[$this->generarAutorAleatorio(),$this->generarAutorAleatorio(),$this->generarAutorAleatorio()];
        return $array;
    }
    public function generarAutorAleatorio():Autor{
        $nombresAutores=["Carmen Mola","Freida McFadden","Federico García Lorca","Brandon Sanderson","Fiódor Dostoievski","Agatha Christie","Charles Dickens"];
        $autorAleatorio = new Autor(((string)rand(1,99)),$nombresAutores[array_rand($nombresAutores)],"Español");
        return $autorAleatorio;
    }
}