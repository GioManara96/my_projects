<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3ac5c91e2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="navbar-brand nav-link" id="logo" href="#">Logo</a></li>
                <li class="nav-item"><a class="nav-link" id="home">HOME</a></li>
                <li class="nav-item"><a class="nav-link">Blog</a></li>
                <li class="nav-item"><a class="nav-link">About Us</a></li>
            </ul>
            <div class="d-flex justify-content-end">
                <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION["userID"])){
                            echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>';
                        } else{
                            echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Log In</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="signup.php"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>';
                        }
                    ?>                    
                </ul>
            </div>
            </ul>
        </div>
    </nav>

    <main>
</body>

</html>