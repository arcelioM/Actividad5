<?php

namespace model;

class employess{
    private  int $employeeNumber;
    private $lastName;
    
    private $firstName;

    private $extension;

    private $email;

    private $officeCode;

    private $reportsTo;

    private $jobTitle;

    public function __construct (int $employeeNumber, $lastName, $firstName, $extension, $email, $officeCode, $reportsTo, $jobTitle)
    {
        $this->employeeNumber = $employeeNumber;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->extension = $extension;
        $this->email = $email;
        $this->officeCode = $officeCode;
        $this->reportsTo = $reportsTo;
        $this->jobTitle = $jobTitle;
    }



    public function __get($name){
       if(property_exists($this,$name)){
          return $this->$name;
       }
    }

    public function __set($name,$value){
       if(property_exists($this,$name)){
          return $this->$name=$value;
       }
    }
}
