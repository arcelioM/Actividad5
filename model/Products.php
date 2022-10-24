<?php

  use model;
  
  class Products {

    private String $productCode;
    private String $productName;
    private String $productLine;
    private String $productScale;
    private String $productVendor;
    private String $productDescription;
    private int $quantityInStock;
    private float $buyPrice;
    private float $MSRP;

    public function __construct(String $productCode, String $productName, String $productLine, String $productScale, String $productVendor, String $productDescription, int $quantityInStock, float $buyPrice, float $MSRP)
    {
      $this->productCode = $productCode;
      $this->productName = $productName;
      $this->productLine = $productLine;
      $this->productScale = $productScale;
      $this->productVendor = $productVendor;
      $this->productDescription = $productDescription;
      $this->quantityInStock = $quantityInStock;
      $this->buyPrice = $buyPrice;
      $this->MSRP = $MSRP;
    }

    public function __get($name)
    {
      if(property_exists($this,$name)){
        return $this->$name;
      }

      return null;
    }

    public function __set($name, $value)
    {
      if(property_exists($this, $name)){
        $this->$name = $value;
      }
    }

    public function __toString()
    {
      return "PRODUCTCODE : $this->productCode | PRODUCTNAME : $this->productName | PRODUCTLINE : $this->productLine | PRODUCTSCALE : $this->productScale | PRODUCTVENDOR : $this->productVendor | QUANTITYINSTOCK : $this->quantityInStock | BUPRICE : $this->buyPrice | MSRP : $this->MSRP";
    }
  }
?>
