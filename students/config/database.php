<?php


$host= "localhost";
$dbname= "adminlte_demo";
$username= "root";
$password= "";

// database connection
$pdo= new PDO("mysql:host = $host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

// try and catch error

try {
} catch (PDOException $e) {
    die("connection failed: " .$e->getMessage());
}




define("BASE_URL","/lesson/");




 ?>