<?php

namespace dao\connection;

require("configEnv.php"); //* ARCHIVO QUE CARGARA LAS VARIABLES DE ENTORNO
use Exception;
use PDO;

class Connection{
    private static ?Connection $connection=null;
    private ?PDO $conexionDB=null;

    private function __construct(){
    }

    /**
     * *DEVOLVERA UNA INSTANCIA DE LA CLASE Connection
     */
    public static function getInstannce():Connection{
        if(self::$connection==null){
            self::$connection = new Connection();
            return self::$connection;
        }
        return self::$connection;
    }    

    /**
     * *RETORNARA LA CONEXION DE LA BD ACTUAL DISPONIBLE
     * *EN CASO DE NO HABER SIDO CREADA UNA CONEXION ANTES, SE CREARA UNA
     */
    public function getConnection():PDO{
        if($this->conexionDB==null){
            return $this->createConnection();
        }

        return $this->conexionDB;
    }

    /**
     * *SE ENCARGAR DE CREAR UNA NUEVA CONEXION A BASE DE DATOS
     */
    private function createConnection():PDO
    {
        try{
            $stringConexion = "mysql:hos=".$_ENV['DATABASE_HOST'].";dbname=".$_ENV['DATABASE_DBNAME']."; chartset=utf8";
            $this->conexionDB = new PDO($stringConexion,$_ENV['DATABASE_USER'],$_ENV['DATABASE_PASSWD']);
            $this->conexionDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->conexionDB->setAttribute(PDO::ATTR_AUTOCOMMIT,true);
            return $this->conexionDB;
       }catch(Exception $e){
           return null;
           echo "ERROR EN CONEXION: ".$e->getMessage();
       }
    }

    public function closeConnection():void{
        $this->conexionDB=null;
    }
}
