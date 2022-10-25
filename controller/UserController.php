<?php
require_once("../autoloads.php");
use dao\connection\Connection;
use dao\user\UserDaoImpl;
use service\user\ServiceUserImpl;

    if($_SERVER["REQUEST_METHOD"]==="GET"){

        $conexionBD= Connection::getInstance();
        $daoUser = new UserDaoImpl($conexionBD);
        $serviceUser = new ServiceUserImpl($daoUser);
        $users =$serviceUser->getAll();
        echo json_encode($users);
    }
?>