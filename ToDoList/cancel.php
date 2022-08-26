<?php
$id = $_GET["ID"];

include "../connessione.php";

$conn = openCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

$sql = "DELETE FROM TTo_do_list where TTo_do_list.ID=" . $id;
$query = mysqli_query($conn, $sql);

closeCon($conn);

header("location: index.php");