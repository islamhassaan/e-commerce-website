<?php 

// echo "Id of the category ".$_GET['idc'];

$id_category = $_GET['idc'];

// the connection string
include "../../include/functions.php";
$conn = connect();

// create the query
$query = "DELETE FROM categories WHERE id='$id_category'";

// execution the query
$result = $conn->query($query);

if ($result) {
    # code...
    header('location:list.php?delete=ok');
}

?>