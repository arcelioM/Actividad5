<?php

namespace model;

class OrderDetails{
    private $orderDetails;

    private $productCode;

    private $quantityOrderes;

    private $priceEach;

    private $orderLineNumber;

    public function __construct($orderDetails, $productCode, $quantityOrderes, $priceEach, $orderLineNumber)
    {
        $this->orderDetails = $orderDetails;
        $this->productCode = $productCode;
        $this->quantityOrderes = $quantityOrderes;
        $this->priceEach = $priceEach;
        $this->orderLineNumber = $orderLineNumber;
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
