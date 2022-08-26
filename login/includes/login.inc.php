<?php

if (isset($_POST["login"])) {
    $username = $_POST["user"];
    $password = $_POST["psw"];

    require_once "dbconn.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $psw);
} else {
    header("location: ../login.php?error=badconn");
    exit();
}
