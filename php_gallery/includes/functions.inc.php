<?php

function createUsersTable($conn){
    $sql = "CREATE TABLE IF NOT EXISTS users(
        id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        fname VARCHAR(30) NOT NULL,
        lname VARCHAR(30) NOT NULL,
        username TEXT NOT NULL,
        email TEXT NOT NULL,
        psw TEXT NOT NULL
    );";

    mysqli_query($conn, $sql);
}

function emptyInputSignup($fname, $lname, $email, $user, $psw){
    $result = false;
    if(empty($fname) || empty($lname) || empty($email) || empty($user) || empty($psw)){
        $result = true;
    }
    return $result;
}

function invalidUser($username){
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    return $result;
}

function pswMatch($psw, $pswRep){
    $result = false;
    if($psw !== $pswRep){
        $result = true;
    }
    return $result;
}

function userExists($conn, $username, $email){
    $result = false;
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../signup.php?error=stmtfailed");
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $stmtResult = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($stmtResult)){
        return $row;    // questa parte ci servirà per il login
    } else{
        return $result;
    }

    // chiudo lo stmt
    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $username, $email, $psw){
    $hasPsw = password_hash($psw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (fname, lname, username, email, psw) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
    }
    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $username, $email, $hasPsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php");
}

// funzioni login
function emptyInputLogin($username, $psw){
    $result = false;
    if(empty($username) || empty($psw)){
        $result = true;
    }
    return $result;
}

function verified_password($psw, $pswDB){
    $result = false;
    if(password_verify($psw, $pswDB)){
        $result = true;
    }
    return $result;
}

// funzioni upload
function createGalleryTable($conn){
    $sql = "CREATE TABLE IF NOT EXISTS gallery(
        id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        imageTitle TEXT NOT NULL,
        imageDescr TEXT NOT NULL,
        imageFullName TEXT NOT NULL,
        userID INT(11) NOT NULL
    );";

    mysqli_query($conn, $sql);
}

function emptyInputUpload($imageTitle, $imageDescription){
    $result = false;
    if(empty($imageTitle) || empty($imageDescription)){
        $result = true;
    }
    return $result;
}

function fileExists($fileDestination){
    $result = false;
    if(file_exists($fileDestination)){
        $result = true;
    }
    return $result;
}

function uploadImage($file, $fileNewName, $imageTitle, $imageDescr){
    session_start();
    $fileExt = strtolower(end(explode(".", $file["name"])));
    $allowedExts = ["jpeg", "jpg", "png", "pdf", "webp"];
    $fileNewName .=  uniqid("", true) . "." . $fileExt;
    $fileDestination = "../assets/images/uploads/" . $fileNewName;
    // controlliamo che il file non esista già
    if(fileExists($fileDestination) !== false){
        header("location: ../index.php?error=file%exists");
        exit();
    }
    // controlliamo che rientri nei file ammessi
    if(in_array($fileExt, $allowedExts)){
        // controlliamo che non ci siano errori
        if($file["error"] === 0){
            // controlliamo la grandezza (in B)
            if($file["size"] < 1000000) { // ~ 1 MB
                //avvio connessione al database
                require "dbconnection.inc.php";

                $sql = "INSERT INTO gallery (imageTitle, imageDescr, imageFullName, userID) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "sssi", $imageTitle, $imageDescr, $fileNewName, $_SESSION["userID"]);
                mysqli_stmt_execute($stmt);

                move_uploaded_file($file["tmp_name"], $fileDestination);

                header("location: ../index.php?image=uploaded");
            }   else{
                header("location: ../index.php?error=image%size");
                exit();
            }
        } else{
            header("location: ../index.php?error=image%error");
                exit();
        }
    } else{
        header("location: ../index.php?error=image%type");
        exit();
    }
}