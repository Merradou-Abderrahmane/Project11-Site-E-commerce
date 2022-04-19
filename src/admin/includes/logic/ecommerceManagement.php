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

       public function getAllCategories(){
        $sqlGetData = 'SELECT * FROM category';
        $result = mysqli_query($this->getConnection(), $sqlGetData);
        $categoriesList = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $categories = array();

        foreach($categoriesList as $categoryList){
            $category = new ECommerce();
            $category->setCategoryId($categoryList['id']);
            $category->setCategoryName($categoryList['name']);
            array_push($categories, $category);  
        }
        return $categories;
    }

    public function getCategory($id){
        $sqlGetQuery = "SELECT * FROM category WHERE id= $id";
    
        // get result
        $result = mysqli_query($this->getConnection(), $sqlGetQuery);
    
        // fetch to array
        $category_data = mysqli_fetch_assoc($result);

        $category = new ECommerce();

        $category->setCategoryId($category_data['id']);
        $category->setCategoryName($category_data['registrationNumber']);
        return $category;
    }  

    public function deleteCategory($id){
        $sqlDeleteQuery = "DELETE FROM category WHERE id= $id";
        mysqli_query($this->getConnection(), $sqlDeleteQuery);
    }

    public function editCategory($id){

        $categoryName = $category->getCategoryName();

 
        // Update query
        $sqlUpdateQuery = "UPDATE category SET 
                            name='$registrationNumber',
                            firstName='$firstName', 
                            lastName='$lastName',
                            birthDate='$birthDate',
                            department='$department',
                            salary='$salary', 
                            occupation='$occupation',
                            photo='$photo' 
                            WHERE id=$id";
 
         // Make query 
         mysqli_query($this->getConnection(), $sqlUpdateQuery);
   
    }

       public function uploadImage($fileName, $tempName){

        $folder = '../data/uploads/' .$fileName;
        // Now let's move the uploaded image into the folder: image
        move_uploaded_file($tempName, $folder);
    }


       public function addProduct($product){
        $productName = $product->getProductName();
        $description = $product->getProductDescription();
        $price = $product->getPrice();
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