<?php
      include "categoryManager.php";
      
      $categoryManager = new CategoryManager();
      $data = $categoryManager->getAllCategories();

?>

<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="add.php">Add</a>
        <table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
                
            </tr>
            <?php 
                   foreach($data as $value){

                    ?>
                    <tr>
                       <td><?= $value->getId() ?></td>
                        <td><?= $value->getName() ?></td>
                        <td><?= $value->getDescription() ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $value->getId() ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $value->getId() ?>">Delete</a>
                        </td>
                    </tr>
                    <?php  }?>
        </table>
    </div>
    
</body>
</html>