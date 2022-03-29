<?php
require_once "product.php";

class ProductManager {

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

    // 

    




}




?>