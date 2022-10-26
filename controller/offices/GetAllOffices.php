<?php 
require_once("../../autoloads.php");
session_start();
use dao\connection\Connection;
use dao\DaoOffices;
use service\ServiceOffices;

    
    if($_SERVER["REQUEST_METHOD"]==="GET"){
            
        if(isset($_SESSION['user'])){
            $conexionBD= Connection::getInstance();
            $daoOffices = new DaoOffices($conexionBD);
            $serviceOffices = new ServiceOffices($daoOffices);
            $offices = $serviceOffices->getAll();
            echo json_encode($offices);
        }else{
            echo 0;
        }
    }else{
        echo 0;
    }

?>