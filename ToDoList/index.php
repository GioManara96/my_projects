<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To DO List</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3ac5c91e2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>

<body>
    <header class="container p-3">
        <h1 class="text-center">TO DO LIST APP</h1>
    </header>
    <main class="container p-3 my-3">
        <form action="submit.php" method="post" name="formSubmit" class="p-3">
            <div class="row align-items-center">
                <div class="col" style="flex: 3;">
                    <input type="text" id="input" name="input" class="form-control" placeholder="Write your tasks...">
                </div>
                <div class="col d-grid my-3">
                    <button type="button" name="add" id="submit-btn" class="btn btn-success mx-3" onclick="check()">ADD</button>
                </div>
            </div>
        </form>

        <hr>

        <?php
        include "../connessione.php";
        $conn = openCon();
        mysqli_query($conn, "SET NAMES 'UTF8'");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } /*else{
            echo "Connected successfully";
        }*/
        
        $input = $_POST["input"];
        $sql = "SELECT * FROM TTo_do_list  LIMIT 25";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) == 0) {
            return;
        }

        echo '<h2 class="py-3">Things to do:</h2>';
        echo "<div class='table-responsive'>";
        echo "<table class='table table-hover text-center'>";
        echo "<thead class='table-warning'>";
        echo "<tr><th>#Task</th><th>Description</th><th>Status</th><th>Options</th></tr>";
        echo "</thead></tbody>";
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr onclick="done()">
                <td><?php echo $row["ID"]; ?></td>
                <td><?php echo $row["Task"]; ?></td>
                <td>
                    <input type="checkbox" id="check<?php echo $row["ID"]; ?>" class="form-check-input" value="0">
                    <label for="check<?php echo $row["ID"]; ?>" class="form-check-label">Not done yet</label>
                </td>
                <td>
                    <button type="button" class="btn" onclick="hide(this)" title="hide task"><i class="fa-solid fa-eye-slash"></i></button> /
                    <a href="cancel.php?ID=<?php echo $row["ID"]; ?>" class="btn" title="delete task"><i class="fa-solid fa-xmark"></i></a>
                </td>
            </tr>
        <?php
        }
        echo "</tbody></table></div>";
        closeCon($conn);
        ?>
    </main>

    <div class="container my-3 p-3 text-center" style="width: 500px;">
        <h2>Want to reset the tasks?</h2>
        <form action="reset.php" method="post">
            <div class="d-grid">
                <button class="btn btn-danger" type="submit" name="reset">ERASE EVERYTHING</button>
            </div>
        </form>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>