<?php

class Product {
    private $id;
    private $name;
    private $description; 
    private $price; // price per unit
    private $image;   
    private $category; 
    private $stock; //quantity
    private $brand;
    private $featured;
    private $sale; 
    private $salePrice; 
    private $date; //date added
    private $active; //active or not
    

    // setters and getters for each property 
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }



} 


?>