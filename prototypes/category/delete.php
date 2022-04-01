<?php
    require_once "categoryManager.php";

if(isset($_GET['id'])){
    $id = $_GET['id'] ;

    //  
    $categoryManager = new CategoryManager();
    $categoryManager->deleteCategory($id);

    header('Location: index.php');
}
?>