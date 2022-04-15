<?php 
require_once "ECommerce.php";

class ECommerceManagement {
    
        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'kawaiiCosmetics');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;

        }

        public function addCategory($category){

            $categoryName = $category->getCategoryName();    
            // SQL query
            $insertRow="INSERT INTO category(`name`) VALUES ('$categoryName')";
                        
    
            mysqli_query($this->getConnection(), $insertRow);
                
       }

       public function addProduct($product){
        $productName = $product->getProductName();
        $description = $product->getProductDescription();
        $price = $product->getProductPrice();
        $stock = $product->getStock();
        $image = $product->getImage();
        $categoryId = $product->getCategoryId();
        

             // sql insert query
        $sqlInsertQuery = "INSERT INTO product(`name`, `description`, `price`, `stock`, `image`, `category_id`)
                        VALUES('$productName','$description','$price','$stock','$image','$categoryId')";
                                

        mysqli_query($this->getConnection(), $sqlInsertQuery);
    }

}


?>