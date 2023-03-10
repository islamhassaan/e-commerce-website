<?php
session_start();

if(isset($_SESSION['name'])){ // if the user already logged in, he couldn't go to login page.
    header('location:profile.php');
}


include "include/functions.php";
$user = 1;
$categories = getAllCategories();

if (!empty($_POST)) {

    $user = login($_POST);
    if ( is_array($user) && count($user) > 0) { // user connect
        Session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['phone'] = $user['phone'];
        header("location: profile.php");
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.2/sweetalert2.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    include "include/header.php";
    ?>

    <div class="col-12 p-5">

        <h1 class="text-center">Log in</h1>

        <form action="login.php" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">login</button>
        </form>
    </div>

    <!-- Footer -->
    <?php
    
    include 'include/footer.php';
    
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.2/sweetalert2.all.min.js">
</script>
<?php
if (!$user) {
    print "
<script>
    Swal.fire({
        title: 'Error',
        text: 'email or password error',
        icon: 'error',
        confirmButtonText: 'Ok',
        timer : 2000
    })
</script>
";
}

?>

</html>