<?php

session_start();

include "include/functions.php";
$categories = getAllCategories();


//button search clicked
if(!empty($_POST)){ 

   // echo "button search clicked";
   // echo $_POST['search'];

    $products =  searchProducts($_POST['search']);

}else{
    $products = getAllProducts();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop</E-Shop>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    include "include/header.php";
    ?>

    <div class="row col-12 mt-4">

        <?php

        foreach ($products as $product) {
            print '<div class="col-3">
<div class="card" style="width: 18rem;">
    <img src="images/'.$product['image'].'" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">'.$product['name'].'</h5>
        <p class="card-text">'.$product['description'].'</p>
        <a href="product.php?id='.$product['id'].'" class="btn btn-primary">details</a>
    </div>
</div>
</div>';
        }
        ?>


    </div>

    <?php
    
    include 'include/footer.php';
    
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</html>