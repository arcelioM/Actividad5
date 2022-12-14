<?php

namespace dao;

use dao\connection\IConnection;
use PDO;
use PDOException;
use util\Log;

class Dao{

    private IConnection $conexionBD;

    public function __construct(IConnection $conexionBD)
    {
        $this->conexionBD = $conexionBD;
    }

    public function getAll($tableName){
        try{
            Log::write("INCIANDO CONSULTA ".$tableName,"CONSULTA");
            $query = "SELECT *  FROM ".$tableName;
            $execute=$this->conexionBD->getConnection()->prepare($query);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            Log::write("INCIANDO CONSULTA ".$tableName,"CONSULTA");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE"; 
        }
    }


    public function getAllTablesName(){
        try {
            Log::write("INCIANDO CONSULTA ","CONSULTA");
            $query = "SELECT table_name AS nombre
            FROM information_schema.tables WHERE table_schema = 'classicmodels'";

            $execute=$this->conexionBD->getConnection()->prepare($query);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            Log::write("Terminando CONSULTA ","CONSULTA");
            return $result;
        } catch (PDOException $e) {
            LOG::write("dao\Dao.php","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE"; 
        }
    }

}
