<?php 
require "vendor/autoload.php";
use classi\Prodotto;
use contenitori\Carrello;
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3ac5c91e2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid px-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Homepage</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav relative">
                        <li class="nav-item align-self-end">
                            <a href="carrello.php" class="nav-link disabled"><i class="fa-solid fa-cart-arrow-down"><span class="badge bg-danger" id="counter">0</span></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-md p-3 my-3">

        <?php
        include "../connessione2.php";

        if(!isset($_SESSION["lista"])){
            $_SESSION["lista"] = array();
        }
        
        foreach ($_SESSION["cart"] as $key => $value) {
            array_push($_SESSION["lista"], unserialize($value));
        }

        
        //print_r($_SESSION["lista"]);
        ?>
    </main>

    <script src="assets/JS/script.js"></script>
</body>

</html>