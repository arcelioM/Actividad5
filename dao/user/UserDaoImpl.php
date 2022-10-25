<?php

namespace dao\user;

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

    /**
     * BUSCAR TODOS LOS USUARIOS ACTIVADOS
     */
    public function getAll(){
        try{
            Log::write("INCIANDO CONSULTA user->getAll()","CONSULTA");
            $query = "SELECT usuario,nombre,apellido,fotoPerfil,status FROM users WHERE status=? ORDER BY usuario";
            $args=array(1);
            $execute=$this->conexionBD->getConnection()->prepare($query);
            $execute->execute($args);
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            Log::write("INCIANDO CONSULTA user->getAll()","CONSULTA");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }


    /**
     * *GUARDAR USUARIO POR ID
     */
    public function getByID($id){

        if($id==null || $id<=0){
            return null;
        }

        try{
            Log::write("INICIANDO CONSULTA | user->getById()","SELECT");
            $sqlQuery="SELECT usuario,nombre,apellido,fotoPerfil,status FROM users WHERE status=? AND id=?";
            $args=array(1,$id);
            $execute=$this->conexionBD->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }


    /**
     * *GUARDAR NUEVO USUARIO
     */
    public function save($entidad):int{

        if($entidad==null){
            return $entidad;
        }

        try{
            Log::write("INCIANDO INSERCION user->save()","INSERT");
            $sqlQuery="INSERT INTO users (usuario,contraseña,nombre,apellido,fotoPerfil,status) VALUES(?,SHA1(?),?,?,?,?,?)";
            $insert=$this->conexionBD->getConnection()->prepare($sqlQuery);

            $argsInsert=array(
                $entidad->usuario,
                $entidad->contraseña,
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
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return 0; 
        }
    }

    /**
     * *ACTUALIZAR USUARIO
     */
    public function update($entidad):int{

        if($entidad->id==null || $entidad->id<=0){
            return 0;
        }

        try {
            $query="UPDATE users SET usuario=?,contraseña=SHA1(?),nombre=?,apellido=?,fotoPerfil=?, status=? WHERE id=?";

            $update = $this->conexionBD->getConnection()->prepare($query);

            $args=array(
                $entidad->usuario,
                $entidad->contraseña,
                $entidad->nombre,
                $entidad->apellido,
                $entidad->fotoPerfil,
                $entidad->status,
                $entidad->id
            );

            $row=$update->execute($args);
            if($row==1){
                Log::write("ACTUALIZACION EXITOSA", "UPDATE");
            }else{
                Log::write("ACTUALIZACION ERROR", "UPDATE");
            }
            return $row;

        } catch (PDOException $e) {
            Log::write("ACTUALIZACION ERROR", "UPDATE");
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return 0;
        }
        
    }


    /**
     * *ACTIVAR O DESACTIVAR USUARI0
     */
    public function changeStatus(User $entidad):int{

        if($entidad===null || $entidad->status===null  ||$entidad->id===null || $entidad->id<=0){       
            return 0;
        }

        try {
            $query="UPDATE users SET status=? WHERE id=?";

            $update = $this->conexionBD->getConnection()->prepare($query);

            $args=array(
                $entidad->status,
                $entidad->id
            );

            $row=$update->execute($args);
            if($row==1){
                Log::write("CAMBIO DE ESTADO EXITOSO", "UPDATE");
            }else{
                Log::write("CAMBIO DE ESTADO ERROR", "UPDATE");
            }
            return $row;

        } catch (PDOException $e) {
            Log::write("CAMBIO DE ESTADO ERROR", "UPDATE");
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return 0;
        }
    }

    /**
     * *VALIDAR CREDENCIAL DE USUARIO
     */
    public function validateUser(User $entidad){

        /**
         * *VALIDANDO LOS DATOS SEAN VALIDOS
         */
        if($entidad == null || $entidad->usuario===null || $entidad->contraseña===null){
            return $entidad;
        }

        try{
            Log::write("INICIANDO CONSULTA | user->getById()","SELECT");
            $sqlQuery="SELECT usuario,nombre,apellido,fotoPerfil,status FROM users WHERE status=? AND usuario=? AND contraseña=SHA1(?)";
            $args=array(
                1,
                $entidad->usuario,
                $entidad->contraseña
            );
            $execute=$this->conexionBD->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return 0;
        }
    }

    public function getByNombre(String $nombre){
        if($nombre===null || $nombre==""){
            return null;
        }

        try{
            Log::write("INICIANDO CONSULTA | user->getByNombre()","SELECT");
            $sqlQuery="SELECT usuario,nombre,apellido,fotoPerfil,status FROM users WHERE  nombre LIKE CONCAT(?, '%') ";
            $args=array($nombre);
            $execute=$this->conexionBD->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\user\UserDaoImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }
}

?>
