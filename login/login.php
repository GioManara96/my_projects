<?php include_once "header.php"; ?>

<div class="container-lg my-3 justify-content-center align-items-center">
    
<?php
    if (isset($_GET["error"])) {
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
    }
    ?>

    <form class="p-3 my-3" method="POST" action="includes/login.inc.php">
        <h2 class="mb-3">Log In</h2>

        <label for="user" class="form-label">Username/Email: <span style="color: red">*</span> </label>
        <input class="form-control" type="text" name="user" id="user" placeholder="Username or email..."><br>

        <label for="psw" class="form-label">Password: <span style="color: red">*</span></label>
        <input class="form-control" type="password" name="psw" id="psw" placeholder="Password..."><br>

        <div class="d-grid my-5">
            <button type="submit" class="btn btn-block btn-success" name="login">LOGIN</button>
        </div>
    </form>
</div>


<?php include_once "footer.php"; ?>