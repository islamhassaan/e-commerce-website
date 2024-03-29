<?php

session_start();

// 1 - form data retrieval
$name = $_POST['name'];
$description = $_POST['description'];
$creator = $_SESSION['id'];
$date_creation = date("Y-m-d");

// 2 - the connection string
include "../../include/functions.php";
$conn = connect();


// i added try catch here to prevent the admin from duplicate category name 
try {

    // 3 - create the query
    $query = "INSERT INTO categories(name,description,creator,date_creation)
    VALUES ('$name', '$description', '$creator', '$date_creation')";

    // 4 - execution the query
    $result = $conn->query($query);

    if ($result) {
        # code...
        header('location:list.php?add=ok');
    }

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        # code...
        header('location:list.php?error=duplicate');
    }
}


?>