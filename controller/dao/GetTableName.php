<?php

require_once("../../autoloads.php");
use dao\connection\Connection;
use dao\Dao;
use service\ServiceDao;

if($_SERVER["REQUEST_METHOD"]==="GET"){
    
    $conexionBD= Connection::getInstance();
    $dao = new Dao($conexionBD);
    $serviceDao = new ServiceDao($dao);
    $datos = $serviceDao->getAllTablesName();
    echo json_encode($datos);
}else{
    echo 0;
}
