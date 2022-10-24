<?php

namespace model;

class User{
    private $id;

    private $cedula;

    private $nombre;

    private $apellido;

    private $fotoPerfil;

    private $status;

    public function __construct( $cedula, $nombre, $apellido, $fotoPerfil, $status)
    {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fotoPerfil = $fotoPerfil;
        $this->status = $status;
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
