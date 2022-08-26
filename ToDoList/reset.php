<?php
include "../connessione.php";

if(isset($_POST["reset"])){
    $conn = openCon();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else{
        echo "Connected successfully";
    }
    $sql = "TRUNCATE TABLE TTo_do_list";
    $query = mysqli_query($conn, $sql);
    closeCon($conn);
    header("location: index.php");
}

