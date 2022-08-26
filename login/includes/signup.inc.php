<?php

if (isset($_POST["submit"])) {
    $fname = $_POST["name"];
    $lname = $_POST["surname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $birth = $_POST["birth"];
    $password = $_POST["psw"];
    $passwordRep = $_POST["pswRepeat"];
    $gender = $_POST["gender"];

    require_once "dbconn.inc.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($fname, $lname, $username, $email, $password, $passwordRep) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidUser($username) !== false){
        header("location: ../signup.php?error=invaliduser");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pswMatch($password, $passwordRep) !== false){
        header("location: ../signup.php?error=unmatched_passwords");
        exit();
    }

    if(userExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fname, $lname, $birth, $gender, $username, $email, $psw);
} else {
    header("location: ../signup.php?error=badconn");
    exit();
}
