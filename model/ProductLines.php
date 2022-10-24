<?php

namespace model;

class ProductLines{
    private $productLine;

    private $textDescription;

    private $htmlDescription;

    private $image;

    public function __construct($productLine, $textDescription, $htmlDescription, $image)
    {
        $this->productLine = $productLine;
        $this->textDescription = $textDescription;
        $this->htmlDescription = $htmlDescription;
        $this->image = $image;
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
