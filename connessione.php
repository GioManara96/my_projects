<?php 
function openCon() {
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "O9VzbcXTyU2OgFEO";
$dbName = "to_do_list";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connect failed: %s\n". $conn -> error);

return $conn;
}

function closeCon($conn) {
    mysqli_close($conn);
 }
?>
