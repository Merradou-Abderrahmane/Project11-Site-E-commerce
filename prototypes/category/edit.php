<?php
require_once 'categoryManager.php';

$categoryManager = new CategoryManager();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $category = $categoryManager->getCategory($id);
}

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $categoryManager->editCategory($id, $name, $description);

    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modifier : </title>
</head>
<body>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="id" name="id"   
        value=<?php echo $category->getId()?> >

    <div>
        <label for="name">Category Name</label>
        <input type="text" required="required" 
         name="name"   
        value=<?php echo $category->getName()?> >
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" required="required" 
         name="description" 
        value=<?php echo $category->getDescription()?>>
    </div>
   
    <div>
        <input name="update" type="submit" value="update">
        <a href="index.php">Dismiss editing</a>
    </div>
</form>
</body>
</html>