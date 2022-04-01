<?php
require_once "category.php";

class CategoryManager {
    // connect to DB method + check for possible errors
    private $connection = NULL;

    public function connectToDB(){
        if (is_null($this->connection)){

            $this->connection = mysqli_connect('localhost', 'test', 'test123', 'project11db' );
        
            if (!$this->connection){
                $message = 'Connection Error: ' . mysqli_connect_error();
                throw new Exception($message);
            }
            return $this->connection;
        }
    }

    // insert a new category to db
    public function addCategory($category){

        $name = $category->getName();
        $description = $category->getDescription();
        
        // SQL query
        $insertRow="INSERT INTO category(name, description) 
                                VALUES('$name', '$description')";

        mysqli_query($this->connectToDB(), $insertRow);
    }
    
    // display all categories
    public function getAllCategories(){
        $SelectRow = 'SELECT id, name, description FROM category';
        $query = mysqli_query($this->connectToDB() ,$SelectRow);
        $categoriesList = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $categories = array();
        foreach ($categoriesList as $valueList) {
            $category = new Category();
            $category->setId($valueList['id']);
            $category->setName($valueList['name']);
            $category->setDescription($valueList['description']);
            array_push($categories, $category);
        }
        return $categories;
    }
    
    // get a single category by id
    public function getCategory($id){
        $SelectRowId = "SELECT * FROM category WHERE id= $id";
        $result = mysqli_query($this->connectToDB(),  $SelectRowId);
        // fetch the result
        $categoryList = mysqli_fetch_assoc($result);
        $category = new Category();
        $category->setId($categoryList['id']);
        $category->setName($categoryList['name']);
        $category->setDescription($categoryList['description']);
        
        
        return $category;
    }

    // delete a category
    public function deleteCategory($id){
        $deleteRow = "DELETE FROM category WHERE id= '$id'";
        mysqli_query($this->connectToDB(), $deleteRow);
    }

    // edit a category
    public function editCategory ($id,$name,$description){
        // 
        $updateRow = "UPDATE category SET name='$name', description='$description'
        WHERE id=$id";

        mysqli_query($this->connectToDB(), $updateRow);

        // if (mysqli_error($this->connectToDB())){
        //     $exceptionMessage = 'Sql Error when editing category' . mysqli_errno($this->connectToDB());
        //     throw new Exception($exceptionMessage);
        // }

    }


 


}



?>