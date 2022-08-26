<?php require_once "header.php"; ?>

<div class="container my-3 p-3"  style="max-width: 800px;">
    <?php
    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case "emptyinput":
                echo "<div class='alert alert-danger alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Warning!</strong> Please fill in all the fields.";
                echo "</div>";
                break;
            case "invaliduser":
                echo "<div class='alert alert-danger alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Warning!</strong> Please enter a valid username.";
                echo "</div>";
                break;
            case "invalidemail":
                echo "<div class='alert alert-danger alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Warning!</strong> Please enter a valid email.";
                echo "</div>";
                break;
            case "password-mismatch":
                echo "<div class='alert alert-warning alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Be careful!</strong> The two passwords do not match.";
                echo "</div>";
                break;
            case "userexists":
                echo "<div class='alert alert-warning alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Sorry!</strong> This username has already be taken. Please try with another one.";
                echo "</div>";
                break;
            case "badconn":
                echo "<div class='alert alert-danger alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Warning!</strong> To continue you must compile the following form.";
                echo "</div>";
                break;
            case "none":
                echo "<div class='alert alert-success alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Success!</strong> The subscription has been registered.";
                echo "</div>";
                break;
            default:
                break;
        }
    }
    ?>
    <form method="post" action="includes/signup.inc.php">
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
            <label for="fname">First name</label>
        </div>
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
            <label for="lname">Last name</label>
        </div>
        <div class="form-floating my-3">
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            <label for="username">Username</label>
        </div>
        <div class="form-floating my-3">
            <input type="password" class="form-control" id="psw" placeholder="Enter password" name="psw">
            <label for="psw">Password</label>
        </div>
        <div class="form-floating my-3">
            <input type="password" class="form-control" id="pswRep" placeholder="Repeat password" name="pswRep">
            <label for="pswRep">Repeat password</label>
        </div>
        <div class="d-grid">
            <button type="submit" name="signup" class="btn btn-primary">SIGN UP</button>
        </div>
    </form>
</div>

<?php require_once "footer.php"; ?>