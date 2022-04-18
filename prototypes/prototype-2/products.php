<?php

class product {

 private $id;
 private $productName;
 private $description;
 private $price;
 private $quantity;

 public function getId(){

    return $this->id;
 }

 public function setId($value){

    $this->id = $value;

 }

 public function getProductName(){

   return $this->productName;

 }


 public function setProductName($value){

   $this->productName = $value;


 }

 public function getDescription(){

   return $this->description;

 }

 public function  setDescription($value){

  $this->description = $value;

 }

 public function getPrice(){

  return $this->price;

 }

public function setPrice($value){

  $this->price = $value;
}


public function getQuantity(){

  return $this->quantity;


}


public function setQuantity($value){

  $this->quantity = $value;
}

}

?>