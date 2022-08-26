<?php

if(isset($_POST["login"])){
    require "dbconnection.inc.php";
    include "functions.inc.php";
    createGalleryTable($conn);
    $user = $_POST["username"];
    $psw = $_POST["psw"];

    if(emptyInputLogin($user, $psw) !== false){
        header("location: ../login.php?error=emptyinput");
            exit();
    }

    // se l'utente esiste, la funzione userExists mi restituisce $row
    $row = userExists($conn, $user, $user);
    if($row !== false){
        if(verified_password($psw, $row["psw"])){
        // quindi tramite array_assoc accedo all'id
        session_start();
        $_SESSION["userID"] = $row["id"];
        $_SESSION["fname"] = $row["fname"];
        //echo $_SESSION["userID"];
        header("location: ../index.php?error=none");
        } else{
            header("location: ../login.php?error=wronglogin");
            exit();
        }
    } else{
        header("location: ../login.php?error=wronglogin");
        exit();
    }
} else{
    header("location: ../login.php?error=badconn");
        exit();
}