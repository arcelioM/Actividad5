<?php

use dao\connection\Connection;
use dao\user\UserDaoImpl;
use service\user\ServiceUserImpl;

    if($_REQUEST['METHOD']==="GET"){

        $conexionBD= Connection::getInstance();
        $daoUser = new UserDaoImpl($conexionBD);
        $serviceUser = new ServiceUserImpl($daoUser);
        $users = $serviceUser->getAll();
        return json_encode($users);
    }
?>