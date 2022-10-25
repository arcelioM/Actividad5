<?php 
require_once("../../autoloads.php");
session_start();
use dao\connection\Connection;
use dao\user\UserDaoImpl;
use service\user\ServiceUserImpl;
    if($_SERVER["REQUEST_METHOD"]==="GET"){
        if(!empty($_GET["nombre"])){
            $nombreUser=$_GET["nombre"];
            $conexionBD= Connection::getInstance();
            $daoUser = new UserDaoImpl($conexionBD);
            $serviceUser = new ServiceUserImpl($daoUser);
            $users =$serviceUser->getByNombre($nombreUser);
            echo json_encode($users);
        }else{
            echo json_encode(0);
        }
    }
?>