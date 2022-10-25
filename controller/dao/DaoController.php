<?php 
require_once("../../autoloads.php");
use dao\connection\Connection;
use dao\Dao;

    if($_SERVER['REQUEST_METHOD']==="GET"){

        if(!empty($_GET["name"])){
            $nombreTabla=$_GET["name"];
            $conexionBD= Connection::getInstance();
            $dao = new Dao($conexionBD);
            $datos = $dao->getAll($nombreTabla);
            echo json_encode($datos);
        }
    }
?>