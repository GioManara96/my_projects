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
            case "unmatched_passwords":
                echo "<div class='alert alert-warning alert-dismissible fade show'>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                echo "<strong>Be careful!</strong> The two passwords do not match.";
                echo "</div>";
                break;
            case "usernametaken":
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
    <form class="p-3 my-3" method="POST" action="includes/signup.inc.php">
        <h2 class="mb-3">Sign Up</h2>
        <!-- fname -->
        <label for="name" class="form-label">Name: <span style="color: red">*</span> </label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Name..."><br>
        <!-- lname -->
        <label for="surname" class="form-label">Surname: <span style="color: red">*</span></label>
        <input class="form-control" type="text" name="surname" id="surname" placeholder="Surname..."><br>
        <!-- username -->
        <label for="username" class="form-label">Username: <span style="color: red">*</span></label>
        <input class="form-control" type="text" name="username" id="username" placeholder="Username..."><br>
        <!-- birthdate -->
        <label for="birth" class="form-label">Birthdate: <span style="opacity: 0.8">(optional)</span></label>
        <input class="form-control" type="date" name="birth" id="birth"><br>
        <!-- email -->
        <label for="email" class="form-label">Email: <span style="color: red">*</span> </label>
        <input class="form-control" type="text" name="email" id="email" placeholder="Email..."><br>
        <!-- password -->
        <label for="psw" class="form-label">Password: <span style="color: red">*</span></label>
        <input class="form-control" type="password" name="psw" id="psw" placeholder="Password..."><br>
        <!-- password again -->
        <label for="pswRepeat" class="form-label">Repeat password: <span style="color: red">*</span></label>
        <input class="form-control" type="password" name="pswRepeat" id="pswRepeat" placeholder="Repeat password..."><br>
        <!-- gender -->
        <label for="male" class="form-label">Gender: <span style="opacity: 0.8">(optional)</span></label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="male" name="gender" value="M">
            <label class="form-check-label" for="male">M</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="female" name="gender" value="F">
            <label class="form-check-label" for="female">F</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="other" name="gender" value="Other">
            <label class="form-check-label" for="other">Other</label>
        </div>
        <!-- submit -->
        <div class="my-5 d-grid">
            <button type="submit" class="btn btn-block btn-success" name="submit">SUBMIT</button>
        </div>
    </form>
</div>

<?php include_once "footer.php"; ?>