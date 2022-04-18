<?php

require_once 'productsClass.php';
require_once 'cartClass.php';

class productManager {

    private function  connectDB(){

        $connect = null; 
        
        if($connect == null){

          $connect =  mysqli_connect('localhost','test','test1234','project11db');

        }

        else {

                $message = 'database connection error';

                throw new Exception($message);
        }

            return $connect;
    }



    // get all products from database to display on main page

   public function getAllProducts(){


       $selectedProducts = "SELECT * FROM products";

       $query = mysqli_query($this->connectDB(), $selectedProducts);
       $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

       $productsArray = array();

       foreach($result as $data){

        $products = new product();

        $products->setId($data['id']);
        $products->setProductName($data['name']);
        $products->setDescription($data['description']);
        $products->setQuantity($data['quantity']);
        $products->setPrice($data['price']);

        array_push($productsArray, $products);

        

       }

       return $productsArray;
      
  }
   
  // get one particular product to display on product details page in order to edit  or delete it

  public function  getProduct($id){
  
    $selectProduct = "SELECT * FROM products WHERE id = '$id' ";
    $queryProduct = mysqli_query($this->connectDB(),$selectProduct);
    $resultProduct = mysqli_fetch_all($queryProduct,MYSQLI_ASSOC);
    $productArray = array();
    
    foreach($resultProduct  as $product){

        $products = new product();

        $products->setId($product['id']);
        $products->setProductName($product['name']);
        $products->setDescription($product['description']);
        $products->setQuantity($product['quantity']);
        $products->setPrice($product['price']);
      }
        array_push($productArray, $products);

    return $productArray;

    
  }

  // start session and store product in session for cart 

  public function  SessionStart($arrCart){
    
      session_start();
      $_SESSION['cart'] = $arrCart;

    }


    
// return cart session 

  public function getCart(){

    if(isset($_SESSION['cart'])){

      return $_SESSION['cart'];
      return array();

    }
  }

// get product from database to insert it into the cart 

    public function getProductForCart($id,$quantity){
              
      $product = "SELECT * FROM products WHERE id = '$id'";
      $query = mysqli_query($this->connectDB(), $product);
      $cartDetails = mysqli_fetch_all($query, MYSQLI_ASSOC);
      $detailsForCart = array();


      foreach($cartDetails as $cart){

        $productCart = new cart();

        $productCart->setIdCart($cart['id']);
        $productCart->setNameProduct($cart['productName']);
        $productCart->setDetails($cart['description']);
        $productCart->setPrice($cart['price']);
        $productCart->setQuantity($quantity);


    }
      array_push($detailsForCart, $productCart);

      return $detailsForCart;
      
    }

}

?>