<?php
  
  namespace model;

use DateTime;

  class Payments {
    
    private int $customerNumber;
    private String $checkNumber;
    private DateTime  $paymentDate;
    private float $amount;
    
    public function __construct(int $customerNumber, String $checkNumber, DateTime $paymentDate, float $amount){
      $this->customerNumber = $customerNumber;
      $this->checkNumber = $checkNumber;
      $this->paymentDate = $paymentDate;
      $this->amount = $amount;
    }

    public function __get($name)
    {
	if(property_exists($this, $name)){
	  return $this->$name;
	}
    }
    
    public function __set($name, $value)
    {
    	if(property_exists($this, $name)){
	  $this->$name = $value;
	}
    }

    public function __toString()
    {
    	return "$this->customerNumber | $this->checkNumber | $this->paymentDate | $this->amount";
    }
  }
?>
