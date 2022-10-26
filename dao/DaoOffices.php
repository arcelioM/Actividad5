<?php

namespace dao;

use PDO;
use PDOException;
use util\Log;
use dao\connection\IConnection;

class DaoOffices implements IDaoTemplate{

    private IConnection $conexionBD;

    public function __construct(IConnection $conexionBD)
    {
        $this->conexionBD = $conexionBD;
    }

    public function getAll(){

        try{
            Log::write("INCIANDO CONSULTA offices->getAll()","CONSULTA");
            $query = "SELECT * FROM offices  ORDER BY city";
            //$args=array(1);
            $execute=$this->conexionBD->getConnection()->prepare($query);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            Log::write("INCIANDO CONSULTA offices->getAll()","CONSULTA");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\DaoOffices.php","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }

    public function getByID($id){

        if($id==null || $id<=0){
            return null;
        }

        try{
            Log::write("INICIANDO CONSULTA | offices->getById()","SELECT");
            $sqlQuery="SELECT * FROM offices WHERE  officeCode=?";
            $args=array($id);
            $execute=$this->conexionBD->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\DaoOffices.php","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }

    }

    public function getByCity($city){

        if($city==null ){
            return null;
        }

        try{
            Log::write("INICIANDO CONSULTA | offices->getById()","SELECT");
            $sqlQuery="SELECT * FROM offices WHERE  city  LIKE CONCAT(?, '%') ";
            $args=array($city);
            $execute=$this->conexionBD->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\DaoOffices.php","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }

    }


    public function save($entidad):int{

        if($entidad==null){
            return $entidad;
        }

        try{
            Log::write("INCIANDO INSERCION office->save()","INSERT");
            $sqlQuery="INSERT INTO offices (city,phone,addressLine1,addressLine2,state,country,postalCode,territory) VALUES(?,
            ?,?,?,?,?,?,?)";
            $insert=$this->conexionBD->getConnection()->prepare($sqlQuery);

            $argsInsert=array(
                $entidad->city,
                $entidad->phone,
                $entidad->addressLine1,
                $entidad->addressLine2,
                $entidad->state,
                $entidad->country,
                $entidad->postalCode,
                $entidad->territory
            );

            $insert->execute($argsInsert);
            $id=$this->conexionBD->getConnection()->lastInsertId();
            if($id!=null){
                Log::write("DATOS INSERTADOS CORRECTAMENTE","INSERT");
                return $id;
            }
            Log::write("INSERCION TERMINADO","INFO");
            return 0;
        }catch(PDOException $e){
            lOG::write("dao\DaoOffice","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return 0; 
        }
    }
    public function update($entidad):int{

        if($entidad->officeCode==null || $entidad->officeCode<=0){
            return 0;
        }

        try {
            LOG::write("INCIANDO ACTUALIZACION","UPDATE");

            $query="UPDATE offices SET city=?, phone=?,addressLine1=?,addressLine2=?,state=?,country=?,postalCode=?,territory=? WHERE officeCode=?";
            
            $args=array(
                $entidad->city,
                $entidad->phone,
                $entidad->addressLine1,
                $entidad->addressLine2,
                $entidad->state,
                $entidad->country,
                $entidad->postalCode,
                $entidad->territory,
                $entidad->officeCode
            );

            $update = $this->conexionBD->getConnection()->prepare($query);

            $row=$update->execute($args);
            if($row==1){
                Log::write("ACTUALIZACION EXITOSA", "UPDATE");
            }else{
                Log::write("ACTUALIZACION ERROR", "UPDATE");
            }
            return $row;

        } catch (PDOException $e) {
            Log::write("ACTUALIZACION ERROR", "UPDATE");
            Log::write("dao\DaoOffices","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return 0;
        }
    }
}
