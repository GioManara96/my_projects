<?php
require_once "header.php";
session_start();
?>
<main class="container p-3">
    <h2>GALLERY</h2>
    <div class="row p-3">
        <?php
        if (isset($_SESSION["userID"])) {
            include "includes/dbconnection.inc.php";
            $sql = "SELECT * FROM gallery WHERE userID = " . $_SESSION["userID"];
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <div class="col my-3">
                    <div class="card">
                        <img class="img-fluid" src="assets/images/uploads/<?php echo $row["imageFullName"]; ?>" alt="image">
                        <div class="card-footer">
                            <span>
                                <p><?php echo $row["imageTitle"]; ?></p>
                            </span>
                            <p><?php echo $row["imageDescr"]; ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>

        <hr>

        <?php

        if (isset($_SESSION["userID"])) {
            switch ($_GET["error"]) {
                case "emptyinput":
                    echo "<div class='alert alert-danger alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Warning!</strong> Please fill in all the fields.";
                    echo "</div>";
                    break;
                case "badconn":
                    echo "<div class='alert alert-danger alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Warning!</strong> To upload an image you must compile the following form.";
                    echo "</div>";
                    break;
                case "file%exists":
                    echo "<div class='alert alert-warning alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Warning!</strong> This image has already been uploaded.";
                    echo "</div>";
                    break;
                case "image%size":
                    echo "<div class='alert alert-danger alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Warning!</strong> The file size is too big.";
                    echo "</div>";
                    break;
                case "image%type":
                    echo "<div class='alert alert-danger alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Warning!</strong> File type not supported.";
                    echo "</div>";
                    break;
                default:
                    break;
            }
        ?>
            <form method="post" action="includes/upload.inc.php" class="upload_form" enctype="multipart/form-data">
                <h2 class="my-3 text-center">UPLOAD</h2>
                <input type="text" class="form-control" name="fileName" placeholder="File name...">
                <input type="text" class="form-control" name="imageTitle" placeholder="Image title...">
                <input type="text" class="form-control" name="imageDescr" placeholder="Image description...">
                <input type="file" class="form-control" name="file">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="upload">UPLOAD</button>
                </div>
            </form>
        <?php
        }
        ?>
</main>

<?php require_once "footer.php"; ?>