<?php
$host = "localhost";
$username = "root";
$password = "chetan@3323";
$database = "ecommerce";

// Create connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
    echo "Error: " . mysqli_connect_error();
    exit();
} 
?>