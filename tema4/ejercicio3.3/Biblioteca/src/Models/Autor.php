<?php
declare(strict_types=1);
namespace Models;
class Autor{
    public function __construct(
    private string $id, 
    private string $nombre, 
    private string $nacionalidad){}
 
    public function getId():string
    {
        return $this->id;
    }
    public function setId($id):self
    {
        $this->id = $id;
        return $this;
    }
    public function getNombre():string
    {
        return $this->nombre;
    }
    public function setNombre($nombre):self
    {
        $this->nombre = $nombre;
        return $this;
    } 
    public function getNacionalidad():string
    {
        return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad):self
    {
        $this->nacionalidad = $nacionalidad;
        return $this;
    }
}