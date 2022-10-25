<?php 
require_once("../../autoloads.php");
session_start();
use dao\connection\Connection;
use dao\user\UserDaoImpl;
use model\User;
use service\user\ServiceUserImpl;
    if($_SERVER["REQUEST_METHOD"]==="GET"){

        if(!empty($_GET["id"])){

            $id=$_GET["id"];
            $conexionBD= Connection::getInstance();
            $daoUser = new UserDaoImpl($conexionBD);
            $serviceUser = new ServiceUserImpl($daoUser);
            $user =$serviceUser->getByID($id);
            echo json_encode($user);
        }
     }
?>