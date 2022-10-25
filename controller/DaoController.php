<?php 
require_once("../autoloads.php");
use dao\connection\Connection;
use dao\Dao;

    if($_SERVER['REQUEST_METHOD']==="GET"){

        $conexionBD= Connection::getInstance();
        $dao = new Dao($conexionBD);
        $datos = $dao->getAll("customers");
        echo json_encode($datos);
    }
?>