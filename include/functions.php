<?php

function connect()
{
    $servername = "localhost";
    $DBuser = "root";
    $DBpass = "";
    $DBname = "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}
function getAllCategories()
{
    // 1 - connect to DB
    $conn = connect();

    // 2 - create query

    $query = "SELECT * FROM categories";

    // 3 - execution the query

    $result = $conn->query($query);

    // 4 - result of the query

    $categories = $result->fetchAll();


    //var_dump($categories);

    return $categories;
}

function getAllProducts()
{
    // 1 - connect to DB
    $conn = connect();

    // 2 - create query

    $query = "SELECT * FROM products";

    // 3 - execution the query

    $result = $conn->query($query);

    // 4 - result of the query

    $products = $result->fetchAll();


    //var_dump($products);

    return $products;
}

function searchProducts($keywords)
{
    // 1 - connect to DB
    $conn = connect();

    // 2 - create query

    $query = "SELECT * FROM products WHERE name LIKE '%$keywords%'";

    // 3 - execution the query

    $result = $conn->query($query);

    // 4 - result of the query

    $products = $result->fetchAll();

    return $products;

}

function getProductById($id)
{

    // 1 - connect to DB
    $conn = connect();

    // 2 - create query

    $query = "SELECT * FROM products WHERE id = $id";

    // 3 - execution the query

    $result = $conn->query($query);

    // 4 - result of the query

    $product = $result->fetch();

    return $product;


}

function addVisitor($data)
{
    // 1 - connect to DB
    $conn = connect();
    $passwordHash = md5($data['password']);

    // 2 - create query

    $query = "INSERT INTO visitors(name, first_name, email, password, phone)
    VALUES ('" . $data['name'] . "', '" . $data['first_name'] . "', '" . $data['email'] . "', '" . $passwordHash . "', '" . $data['phone'] . "')";

    // 3 - execution the query

    $result = $conn->query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }

}

function login($data)
{
    // 1 - connect to DB
    $conn = connect();

    // 2 - create query

    $email = $data['email'];
    $password = md5($data['password']); 
    $query = "SELECT * FROM visitors WHERE email='$email' AND password='$password'";

    // 3 - execution the query

    $result = $conn->query($query);

    $user = $result->fetch();
    return $user;

}

/**
* Summary of connectAdmin
* @param mixed $data
* @return mixed
*/
function connectAdmin($data)
{
        // 1 - connect to DB
        $conn = connect();

        // 2 - create query
    
        $email = $data['email'];
        $password = md5($data['password']); 
        $query = "SELECT * FROM administrator WHERE email='$email' AND password='$password'";
    
        // 3 - execution the query
    
        $result = $conn->query($query);
    
        $user = $result->fetch();
        return $user;
}
?>