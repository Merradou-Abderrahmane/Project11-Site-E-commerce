<?php
require_once "../logic/ecommerceManagement.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

$ecommerceManagement = new EcommerceManagement();
$ecommerceManagement->deleteCategory($id);
header('Location: index.php');
}

?>
