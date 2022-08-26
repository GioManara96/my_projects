<?php
session_start();
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
}
include "../connessione2.php";

$conn = openCon();
mysqli_query($conn, "SET NAMES 'UTF8'");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} /*else{
            echo "Connected successfully";
}*/


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
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
                        <a href="#" class="nav-link disabled">Homepage</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav relative">
                        <li class="nav-item align-self-end">
                            <a href="checkout.php" class="nav-link"><i class="fa-solid fa-cart-arrow-down"><span class="badge bg-danger" id="counter">0</span></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <main class="container-md p-3 my-3">
        <form method="post" class="d-flex" action="">
            <div class="input-group">
                <button class="input-group-text" type="submit" style="display: inline" class="btn"><i class="fa-solid fa-magnifying-glass"></i> </button>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search a product...">
            </div>
        </form>

        <hr>

        <h2 class="mb-3">I nostri prodotti</h2>

        <?php
        $sql = "SELECT * FROM TArticoli ORDER BY PrezzoUnitario asc limit 25";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {

        ?>
            <div class="row">
                <div class="card my-3 p-3">
                    <div class="card-header"></div>
                    <div class="card-body relative">
                        <h4 class="card-title"><?php echo $row["Nome"]; ?></h4>
                        <div class="row align-items-center">
                            <div class="col-md-4 p-3 border-right">
                                <img src="assets/images/<?php echo $row["ImageFileName"]; ?>" alt="immagine prodotto">
                            </div>
                            <div class="col-md-8 p-3">
                                <p class="card-text p-3"><?php echo $row["Descrizione"]; ?></p>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-8">
                                    <div class="row text-center align-items-center">
                                        <div class="col-md-4 p-3">
                                            <p class="card-text" style="font-size: 28px; font-weight: bold;">€ <?php echo number_format($row["PrezzoUnitario"], 2, ",", "."); ?></p>
                                        </div>
                                        <div class="col-md-8">
                                            <form action="cart-operations.php?action=add&code=<?php echo $row["CodiceArticolo"]; ?>" method="post">
                                                <input type="number" name="quantity" placeholder="0" min="0" max="50">
                                                <button class="btn" type="submit"><i class="fa-solid fa-cart-arrow-down"></i> Aggiungi al carrello</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        <?php
        }
        echo $quantità;
        ?>
    </main>

    <script src="assets/JS/script.js"></script>
</body>

</html>