<?php
declare(strict_types=1);
namespace Models;
use Models\AutorRepositorio;
use Lib\Pages;
class AutorController{
    private Pages $pages;
    private AutorRepositorio $repositorio;
    public function __construct(){
        $this->pages = new Pages();
        $this->repositorio = new AutorRepositorio(); 
    }
}