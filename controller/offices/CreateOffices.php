<?php 
require_once("../../autoloads.php");
session_start();
use dao\connection\Connection;
use dao\DaoOffices;
use model\Offices;
use service\ServiceOffices;

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        
        if(isset($_SESSION['user'])){

                $city = $_POST["city"];
                $phone = $_POST["phone"];
                $addressLine1 = $_POST["addressLine1"];
                $addressLine2 = $_POST["addressLine2"];
                $state = $_POST["state"];
                $country = $_POST["country"];
                $postalCode=$_POST["postalCode"];
                $territory=$_POST["territory"];

                $conexionBD= Connection::getInstance();
                $daoOffices = new DaoOffices($conexionBD);
                $serviceOffices = new ServiceOffices($daoOffices);

                $office = new Offices($city,$phone,$addressLine1,$addressLine2,$state,$country,$postalCode,$territory);

                $row =$serviceOffices->save($office);
                echo json_encode($row);
        }else{
            echo 0;
        }
    }else{
        echo 0;
    }
?>