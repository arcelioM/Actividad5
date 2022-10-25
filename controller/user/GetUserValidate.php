<?php 
    require_once("../../autoloads.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"]==="GET"){
        if(!empty($_SESSION["user"])){
            $usuario=$_SESSION["user"];
            echo json_encode($usuario);
        }else{
            echo json_encode(0);
        }
    }
?>