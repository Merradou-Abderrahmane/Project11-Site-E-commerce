<?php

class ECommerce {
    private $categoryId;
    private $categoryName; 

    private $productId;
    private $productName;
    private $productDescription; 
    private $price; // price per unit
    private $image;   
    private $stock; //quantity
    private $brand;
    private $featured;
    private $sale; 
    private $salePrice; 
    private $date; //date added
    private $active; //active or not
    

    // setters and getters for each property 
    public function setCategoryId($categoryId){
        $this->categoryId = $categoryId;
    }

    public function getCategoryId(){
        return $this->categoryId;
    }

    public function setCategoryName($categoryName){
        $this->categoryName = $categoryName;
    }

    public function getCategoryName(){
        return $this->categoryName;
    }

    public function setProductId($productId){
        $this->productId = $productId;
    }

    public function getProductId(){
        return $this->productId;
    }

    public function setProductName($productName){
        $this->productName = $productName;
    }

    public function getProductName(){
        return $this->productName;
    }

    public function setProductDescription($productDescription){
        $this->productDescription = $productDescription;
    }

    public function getProductDescription(){
        return $this->productDescription;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }

    public function getStock(){
        return $this->stock;
    }





} 


?>