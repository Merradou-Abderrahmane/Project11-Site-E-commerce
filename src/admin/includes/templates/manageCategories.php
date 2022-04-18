<?php
require_once '../logic/ecommerceManagement.php';
$ecommerceManagemnt = new ECommerceManagement();
$data = $ecommerceManagemnt->getAllCategories();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://kit.fontawesome.com/110fb8b8a8.js" crossorigin="anonymous"></script>
    <title>Ecommerce Managemnt</title>
	<link href="../../layout/css/style.css" rel="stylesheet" />
	<link href="../../layout/css/custom.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand  ">
        <!-- Navbar Brand-->
        <div class='w-100'>
            <img id="logo" class=" ms-3 rounded-circle" style="width:50px;" src="../../layout/images/logo.png" alt="logo">

            <a class="navbar-brand ps-3" id="top-title" href="index.php">Employee management</a>
            <a href="logOut.php" style="text-decoration: none; margin-left: 850px; "  > <i class="fa fa-sign-out" style="margin-right:5px;" aria-hidden="true"></i>log Out</a>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion">
                <div class="sb-sidenav-menu sb-sidenav-custom">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-fw fa-globe"></i></div>
                            Browse Employees <br>
                        </a>
                        <a class="nav-link" href="search.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-fw fa-search"></i></div>
                            Find Employee <br>
                        </a>
                        <a class="nav-link" href="addProduct.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-fw fa-plus-circle"></i></div>
                            Add Product <br>
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer sb-sidenav-custom">
                    <div class="small">Logged in as:</div>
                    🟢 Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-2">
                    <h1 class="mt-4">💄Categories management</h1>
                    <form method="GET">
                        <div class="card mt-4 ">
                            <div class="card-header">

                            </div>
                            <div class="card-body" id="card-body">
                                <table class="table">
                                    <thead id="table-head">
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name </th>
                                            <th id="actions">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($data as $category) {
                                    ?>
                                        <tr>
                                            <td><?= $category->getCategoryId() ?></td>
                                            <td><?= $category->getCategoryName() ?></td>
                                            <td>
                                                <a href="editCategory.php?id=<?php echo $category->getCategoryId() ?>" class="text-primary" style="text-decoration: none;"><i class="fa fa-fw fa-edit"></i>Edit</a> |
                                                <a href="deleteCategory.php?id=<?php echo $category->getCategoryId() ?>" class="text-danger" style="text-decoration: none;" onClick="return confirm('Are you sure you want to delete this category ?');"><i class="fa fa-fw fa-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                <!-- <button class="btn-custom btn-secondary-custom-1" id="print"  onclick="onPrint()">Print</button> -->
                            </div>
                        </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>