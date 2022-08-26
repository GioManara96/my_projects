<?php
include "../connessione.php";


$conn = openCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
$input = $_POST["input"];
$sql1 = "INSERT INTO TTo_do_list (Task) VALUES (?);";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql1)) {
    header("location: index.php");
}
mysqli_stmt_bind_param($stmt, "s", $input);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("location: index.php");
