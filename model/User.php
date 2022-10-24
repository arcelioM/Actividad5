<?php

namespace model;

class User{
    private $id;

    private $cedula;

    private $nombre;

    private $apellido;

    private $fechaNacimiento;

    private $fechCreacion;

    public function __construct($id, $cedula, $nombre, $apellido, $fechaNacimiento, $fechCreacion)
    {
        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fechCreacion = $fechCreacion;
    }

    public function __get($name){
       if(property_exists($this,$name)){
          return $this->$name;
       }
    }

    public function __set($name,$value){
        if(property_exists($this,$name)){
            return $this->$name=$value;
        }
    }
}
