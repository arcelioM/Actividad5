<?php 
    
    require_once("../../autoloads.php");
    session_start();
    use dao\connection\Connection;
    use dao\user\UserDaoImpl;
    use model\User;
    use service\user\ServiceUserImpl;
    
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            
            if(isset($_SESSION['user'])){
    
                
                if(!empty($_POST["usuario"]) && !empty($_POST["apellido"]) && !empty($_POST["nombre"]) && !empty($_POST["id"]) ){
                    $nombre = $_POST["nombre"];
                    $apellido = $_POST["apellido"];
                    $usuario = $_POST["usuario"];
                    $passwd = $_POST["passwd"];
                    $status = $_POST["status"];
                    $id=$_POST["id"];
                    $conexionBD= Connection::getInstance();
                    $daoUser = new UserDaoImpl($conexionBD);
                    $serviceUser = new ServiceUserImpl($daoUser);
    
                    $user = new User($nombre,$apellido,null,$status,$usuario);
                    $user->contraseña=$passwd;
                    $user->id=$id;
                    $row =$serviceUser->update($user);
                    echo json_encode($row);
                }else{
                    echo 1;
                }
            }else{
                echo 2;
            }
        }else{
            echo 2;
        }
?>