<?php
$dbServername = "mariadb";
$dbUsername = "cs332s25";
$dbPassword = "rIJx0EZs";
$dbName = "cs332s25";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


// echo "Connected" . "<br>" . "Welcome to the CPSC 332 Database!" . "<br>";
?>