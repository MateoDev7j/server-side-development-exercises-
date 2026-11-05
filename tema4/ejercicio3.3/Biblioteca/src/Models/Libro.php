<?php
declare(strict_types=1);
namespace Models;
class Libro{
    public function __construct(
    private string $id, 
    private string $titulo, 
    private string $autorId,
    private string $disponible){}

    public function getId():string
    {
        return $this->id;
    }
    public function setId($id):self
    {
        $this->id = $id;
        return $this;
    } 
    public function getTitulo():string
    {
        return $this->titulo;
    }
    public function setTitulo($titulo):self
    {
        $this->titulo = $titulo;
        return $this;
    }
    public function getAutorId():string
    {
        return $this->autorId;
    }
    public function setAutorId($autorId):self
    {
        $this->autorId = $autorId;
        return $this;
    }
    public function getDisponible():string
    {
        return $this->disponible;
    }
    public function setDisponible($disponible):self
    {
        $this->disponible = $disponible;
        return $this;
    }
}