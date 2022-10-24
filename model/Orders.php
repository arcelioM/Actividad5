<?php

namespace model;

class Orders{
    private $orderNumber;

    private $orderDate;

    private $requiredDate;

    private $shippedDate;

    private $status;

    private $comments;

    private $customerNumber;

    public function __construct($orderNumber, $orderDate, $requiredDate, $shippedDate, $status, $comments, $customerNumber)
    {
        $this->orderNumber = $orderNumber;
        $this->orderDate = $orderDate;
        $this->requiredDate = $requiredDate;
        $this->shippedDate = $shippedDate;
        $this->status = $status;
        $this->comments = $comments;
        $this->customerNumber = $customerNumber;
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
