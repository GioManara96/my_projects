<?php 

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "O9VzbcXTyU2OgFEO";
$dbName = "esercitazione_agosto";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connect failed: %s\n". mysqli_connect_error());
}


