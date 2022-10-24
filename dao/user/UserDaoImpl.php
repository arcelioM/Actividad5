<?php

namespace dao\user;

use dao\connection\Connection;
use dao\connection\IConnection;
use dao\user\IUserDao;
use model\User;
use PDO;
use PDOException;
use util\Log;

class UserDaoImpl implements IUserDao{

    private IConnection $conexionBD;

    public function __construct(IConnection $conexionBD)
    {
        $this->conexionBD = $conexionBD;
    }

    public function getAll(){
        try{
            Log::write("INCIANDO CONSULTA user->getAll()","CONSULTA");
            $query = "SELECT usuario,contraseña,nombre,apellido,fotoPerfil,status FROM users WHERE status=? ORDER BY usuario";
            $args=array(1);
            $execute=$this->conexionBD->getConnection()->prepare($query);
            $execute->execute($args);
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            Log::write("INCIANDO CONSULTA user->getAll()","CONSULTA");
            return $result;
        }catch(PDOException $e){
            lOG::write("dao\user\UserDaoImpl","ERROR");
            Log::write($e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }
    public function getByID($id){

        try{
            Log::write("INICIANDO CONSULTA | user->getById()","SELECT");
            $sqlQuery="SELECT usuario,contraseña,nombre,apellido,fotoPerfil,status FROM users WHERE status=? AND id=?";
            $args=array(1,$id);
            $execute=$this->conexionBD->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            lOG::write("dao\user\UserDaoImpl","ERROR");
            Log::write($e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }
    public function save($entidad):int{
        try{
            Log::write("INCIANDO INSERCION user->save()","INSERT");
            $sqlQuery="INSERT INTO users (usuario,contraseña,nombre,apellido,fotoPerfil) VALUES(?,SHA1(?),?,?,?)";
            $insert=$this->conexionBD->getConnection()->prepare($sqlQuery);

            $argsInsert=array(
                $entidad->cedula,
                $entidad->nombre,
                $entidad->apellido,
                $entidad->fotoPerfil,
                $entidad->status
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
            lOG::write("dao\user\UserDaoImpl","ERROR");
            Log::write($e->getMessage(),"ERROR");
            return 0; 
        }
        return 0;
    }
    public function update($entidad):int{
        return 0;
    }
    public function delete(User $entidad):int{
        return 0;
    }
}

?>
