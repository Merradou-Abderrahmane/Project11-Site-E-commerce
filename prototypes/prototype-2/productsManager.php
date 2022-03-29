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
            $products = new Product();
            $products->setId($resultValue["id"]);
            $products->setName($resultValue["name"]);
            $products->setPrice($resultValue["price"]);

            array_push($productsArray, $products);
        }
        return $productsArray;



    }

    // Display single product details ( in productDetails.php)
    public function getProduct($id){
        $selectedProduct = "SELECT * FROM WHERE id= '$id' ";
        $productQuery = mysqli_query($this->connectToDB(), $selectedProduct);
        $productResult = mysqli_fetch_all($productQuery, MYSQLI_ASSOC);

        $productArray = array();
        foreach($productResult as $productValue){
            $product = new Product();
            $product->setId($productValue['id']);
            $product->setName($productValue['name']);
            $product->setPrice($productValue['price']);

            array_push($productArray, $product);
        }

        return $productArray;


    }
    
}




?>