<?php
require_once "product.php";

class ProductManager {
    // connect to DB method + check for possible errors
    private $connection = NULL;

    public function connectToDB(){
        if (is_null($this->connection)){

            $this->connection = mysqli_connect('localhost', 'test', 'test123', 'peoject11' );
        
            if (!$this->connection){
                $message = 'Connection Error: ' . mysqli_connect_error();
                throw new Exception($message);
            }
            return $this->connection;
        }
    }
    
    // Display all products method ( in index.php)

    public function getAllProducts(){
        $selectedProducts = 'SELECT * FROM prototype_2';
        $query = mysqli_query($this->connectToDB(), $selectedProducts);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $productsArray = array();
        foreach($result as $resultValue){
            $product = new Product();
            $product->setId($resultValue["id"]);
            $product->setName($resultValue["name"]);
            $product->setPrice($resultValue["price"]);

            array_push($productsArray, $product);
        }
        return $productsArray;



    }

    // 

    




}




?>