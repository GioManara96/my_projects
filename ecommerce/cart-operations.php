<?php
session_start();
include "../connessione2.php";
require "vendor/autoload.php";

use contenitori\Carrello;
use classi\Prodotto;

$conn = openCon();

$sql = "SELECT * FROM TArticoli WHERE CodiceArticolo='" . $_GET["code"] . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
mysqli_query($conn, "SET NAMES 'UTF8'");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} /*else{
    echo "Connected successfully";
}*/

if (isset($_SESSION["cart"])) {
    $quantità = $_POST["quantity"];
    $_SESSION["quantity"] = $quantità;
    $cart = new Carrello;
    $p = new Prodotto($row["CodiceArticolo"], $row["Nome"], $row["PrezzoUnitario"], $quantità, $row["ImageFileName"]);
    
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
                $cart->addProdotto($p);
                array_push($_SESSION["cart"], serialize($cart->getLista()[count($cart->getLista())-1]));
                break;
            case "remove":
                $cart->removeProdotto($p);
                break;
            case "clear":
                $cart->clear();
                break;
            default:
                return;
        }
    }

    foreach ($_SESSION["cart"] as $key => $value) {
        print_r(unserialize($value));
    }


}
header("location: index.php");
//session_unset();
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><a href="index.php">Homepage</a></p>
</body>

</html>