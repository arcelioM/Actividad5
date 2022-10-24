<?php

namespace model;

class User{
    private $id;

    private $nombre;

    private $apellido;

    private $fotoPerfil;

    private $status;

    private $usuario;

    private $contraseña;

    public function __construct(  $nombre, $apellido, $fotoPerfil, $status, $usuario)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fotoPerfil = $fotoPerfil;
        $this->status = $status;
        $this->usuario = $usuario;
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
