<?php 
    require_once("../../autoloads.php");
    session_start();
    use dao\connection\Connection;
    use dao\DaoOffices;
    use service\ServiceOffices;
    
        if($_SERVER["REQUEST_METHOD"]==="GET"){
            
            if(isset($_SESSION['user']) && !empty($_GET["officeCode"])){

                $officeCode=$_GET["officeCode"];
                $conexionBD= Connection::getInstance();
                $daoOffices = new DaoOffices($conexionBD);
                $serviceOffices = new ServiceOffices($daoOffices);
                $office = $serviceOffices->getByID($officeCode);
                echo json_encode($office);
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
?>