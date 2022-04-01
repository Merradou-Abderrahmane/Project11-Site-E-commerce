<?php

include "categoryManager.php";
// 
$categoryManager = new CategoryManager();


if(!empty($_POST)){
    $category = new Category();
    $category->setName($_POST['name']);
    $category->setDescription($_POST['description']);
    $categoryManager->addCategory($category);

    // 
    header("Location: index.php");
}
?>

<form action="" method="POST">
Category Name: <input type="text" name="name" >
Description : <input type="text" name="description" >


<button type="submit">Add Category</button>
</form>
