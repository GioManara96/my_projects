<?php
error_reporting( E_ALL | E_STRICT ); 
ini_set( 'display_errors', 1 );

if(isset($_POST["signup"])){
    include "dbconnection.inc.php";
    include "functions.inc.php";
    createUsersTable($conn);

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $user = $_POST["username"];
    $psw = $_POST["psw"];
    $pswRep = $_POST["pswRep"];

    if(emptyInputSignup($fname, $lname, $email, $user, $psw) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidUser($user) !== false){
        header("location: ../signup.php?error=invaliduser");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pswMatch($psw, $pswRep) !== false){
        header("location: ../signup.php?error=password-mismatch");
        exit();
    }

    if(userExists($conn, $user, $email) !== false){
        header("location: ../signup.php?error=userexists");
        exit();
    }

    createUser($conn, $fname, $lname, $user, $email, $psw);
} else{
    header("location: ../signup.php?error=badconn");
}