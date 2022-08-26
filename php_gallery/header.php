<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Gallery</title>
    <link rel="stylesheet" href="assets/CSS/reset.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3ac5c91e2b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>
    <header class="mb-3">
        <div class="container-fluid">
            <nav class="top-nav navbar-expand-sm">
                <ul>
                    <li>
                        <span class="home"><a href="index.php" title="homepage">Home</a></span>
                    </li>
                    <li>
                        <a href="#" title="about us">About Us</a>
                    </li>
                    <li>
                        <a href="#" title="Contacts">Contacts</a>
                    </li>

                    <div class="nav-right">
                        <?php 
                            if(isset($_SESSION["userID"])){
                                echo "<li>Welcome back <em>" . $_SESSION["fname"] . "</em></li>";
                                echo '<li>';
                                echo '<a><a href="includes/logout.inc.php" title="Log Out"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>';
                                echo '</li>';
                            } else{
                                echo '<li>';
                                echo '<a href="login.php" title="Log In"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>';
                                echo '</li>';

                                echo '<li>';
                                echo '<a href="signup.php" title="Sign Up"><i class="fa-solid fa-user-plus"></i></a>';
                                echo '</li>';
                            }
                        ?>
                    </div>
                </ul>
            </nav>
        </div>
    </header>