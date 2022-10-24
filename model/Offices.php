<?php

namespace model;

class Offices{
    private $officeCode;

    private $city;

    private $phone;

    private $addressLine1;

    private $addressLine2;

    private $state;

    private $country;

    private $postalCode;

    private $territory;

    public function __construct($officeCode, $city, $phone, $addressLine1, $addressLine2, $state, $country, $postalCode, $territory)
    {
        $this->officeCode = $officeCode;
        $this->city = $city;
        $this->phone = $phone;
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->territory = $territory;
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
