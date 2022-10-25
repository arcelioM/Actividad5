<?php 
    require_once("../../autoloads.php");

    use dao\connection\Connection;
    use dao\user\UserDaoImpl;
    use model\User;
    use service\user\ServiceUserImpl;
    use util\Log;

    if($_SERVER['REQUEST_METHOD']==="POST"){
        if(!empty($_POST["username"]) || !empty($_POST["passwd"]) ){

            $user = $_POST["username"];
            $pass = $_POST["passwd"];
            $usuario = new User(null,null,null,null,$user);
            $usuario->contraseña=$pass;

            $conexionBD= Connection::getInstance();
            $daoUser = new UserDaoImpl($conexionBD);
            $serviceUser = new ServiceUserImpl($daoUser);
            $userReturn = $serviceUser->validateUser($usuario);
            
            if($userReturn!=1){
                echo json_encode($userReturn);
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }else{
        echo 0;
    }
?>