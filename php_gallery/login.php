<?php require_once "header.php"; ?>

<div class="container my-3 p-3" style="max-width: 800px;">
    <?php
    switch ($_GET["error"]) {
        case "emptyinput":
            echo "<div class='alert alert-danger alert-dismissible fade show'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Warning!</strong> Please fill in all the fields.";
            echo "</div>";
            break;
        case "wronglogin":
            echo "<div class='alert alert-danger alert-dismissible fade show'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Warning!</strong> Username or password not correct.";
            echo "</div>";
            break;
        case "badconn":
            echo "<div class='alert alert-danger alert-dismissible fade show'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Warning!</strong> To continue you must compile the following form.";
            echo "</div>";
            break;
        default:
            break;
    }
    ?>
    <form method="post" action="includes/login.inc.php">
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            <label for="username">Username</label>
        </div>
        <div class="form-floating my-3">
            <input type="password" class="form-control" id="psw" placeholder="Enter password" name="psw">
            <label for="psw">Password</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary" name="login">LOG IN</button>
        </div>
    </form>
</div>

<?php require_once "footer.php"; ?>