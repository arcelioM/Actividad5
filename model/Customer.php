<?php

namespace model;

class Customer{
    private $customerNumber;

    private $customerName;

    private $contactLastName;

    private $contactFirstName;

    private $phone;

    private $addressLine1;

    private $addressLine2;

    private $city;

    private $state;

    private $postalCode;

    private $country;

    private $salesRepEmployeeNumber;

    private $creditLimit;

    public function __construct($customerNumber, $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit)
    {
        $this->customerNumber = $customerNumber;
        $this->customerName = $customerName;
        $this->contactLastName = $contactLastName;
        $this->contactFirstName = $contactFirstName;
        $this->phone = $phone;
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->city = $city;
        $this->state = $state;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->salesRepEmployeeNumber = $salesRepEmployeeNumber;
        $this->creditLimit = $creditLimit;
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
