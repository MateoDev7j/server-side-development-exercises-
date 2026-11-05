<?php

namespace Models;

class Alumno{
    private int $id;
    public function __construct(
        private string $nombre ="",
        private string $apellidos = "",
        private float $nota =0,
        private int $datey=0

    ){$this->id=1;}
    public function nombreCompleto():string{
        return $this->nombre .' '. $this->apellidos;
    }
    public function getFechaNac():string{
        return $this->datey;
    }

    public function setNombre($nombre):self{
        $this->nombre = $nombre;
        return $this;
    }
    public function setApellidos($apellidos):self{
        $this->apellidos = $apellidos;
        return $this;
    }
    public function getDatey():int{
        return $this->datey;
    }
    public function setDatey($datey):self{
        $this->datey = $datey;
        return $this;
    }
    public function getEdad():int {
        return $edadAlumnno = ((int)Date('Y'))-$this->datey;
    }
    public function getNombre():string{
        return $this->nombre;
    }
}