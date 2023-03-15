<?php

session_start();

// 1 - form data retrieval
$id = $_POST['idc'];
$name = $_POST['name'];
$description = $_POST['description'];
$date_edit = date("Y-m-d");

// 2 - the connection string
include "../../include/functions.php";
$conn = connect();

// 3 - create the query
$query = "UPDATE categories SET name='$name', description= '$description', date_edit= '$date_edit' 
WHERE id= '$id'";

// 4 - execution the query
$result = $conn->query($query);

if ($result) {
    # code...
    header('location:list.php?edit=ok');
}

?>