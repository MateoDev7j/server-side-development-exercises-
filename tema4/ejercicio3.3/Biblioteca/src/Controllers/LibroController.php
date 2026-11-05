<?php
declare(strict_types=1);
namespace Controllers;
use Models\LibroRepositorio;
use Lib\Pages;
class LibroController{
    private Pages $pages;
    private LibroRepositorio $repositorio;
    private array $libros;

    public function __construct(){
        $this->pages = new Pages();
        $this->repositorio = new LibroRepositorio(); 
        $this->libros=[];
    }
    public function listaLibros():void{
        $this->libros=$this->repositorio->getAll();

        $this->pages->render("libros/listaLibros",['libros' => $this->libros]);
    }
    public function detalleLibro():void{
        $id = $_GET['id'] ?? '';
        $this->libros = $this->repositorio->getAll(); 
        $resultado=[];
        $encontrado = array_filter($this->libros, function($objeto) use ($id) {
            return (string)$objeto->getId() === $id;
        });
        if(!empty($encontrado)){
            $resultado=['mensaje'=>"El id de libro existe en el array",
                        'libroDetalle'=>reset($encontrado)];
        }
        else{
            $resultado=['mensaje'=>"El id no existe en el array",
                        'libroDetalle'=>null];
        }
        $this->pages->render("libros/libroDetalle",['resultado'=>$resultado]);
    }

}