<?php

Session_start();

if (!isset($_SESSION['name'])) { // if the user didn't login in and want to go to profile, he should go tp login page first.
    header('location:login.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <?php

    include 'include/header.php';

    ?>

    <div class="container">

        <h1>Welcome <span class="text-primary">
                <?= $_SESSION['name'] . " " . $_SESSION['first_name']; ?>
            </span></h1>
        <h2> Email :
            <?= $_SESSION['email']; ?>
        </h2>

    </div>

    <?php
    
    include 'include/footer.php';
    
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</html>