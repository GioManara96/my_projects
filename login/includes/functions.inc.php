<?php
// sign up functions
function emptyInputSignup($fname, $lname, $username, $email, $psw, $pswRep){
    $result = false;
    if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($psw) || empty($pswRep)){
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
    $sql = "SELECT * FROM TUsers WHERE username = ? OR email = ?;";
    // comincio lo statement
    $stmt = mysqli_stmt_init($conn);
    // verifico se la preparazione di $stmt fallisce oppure no (magari per un errore nella scrittura del sql)
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../signup.php?error=stmtfailed");
      exit();  
    }
    // se non fallisce, allora continuo.
    // s sta per 'string' e ne metto tante quante sono le variabili che passo
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    // ora lo eseguo
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

function createUser($conn, $fname, $lname, $birth, $gender, $username, $email, $psw){
    $sql = "INSERT INTO TUsers (firstName, lastName, birthDate, gender, username, email, pwd)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../signup.php?error=stmtfailed");
      exit();  
    }

    // rendiamo la psw illeggibile per sicurezza
    $hashPsw = password_hash($psw, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $birth, $gender, $username, $email, $hashPsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

// log in functions
function emptyInputLogin($username, $psw){
    $result = false;
    if(empty($username) || empty($psw)){
        $result = true;
    }
    return $result;
}

function loginUser($conn, $username, $psw){
    $userExists = userExists($conn, $username, $username); // poichè nella funzione l'sql cerca o lo user o la mail posso scrivere due volte username

    if($userExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pswHashed = $userExists["pwd"];
    $checkPsw = password_verify($psw, $pswHashed);  // tramite questa funzione posso confrontare le due psw anche se una a codificata

    if($checkPsw === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if($checkPsw === true){
        session_start();
        $_SESSION["userID"] = $userExists["id"];
        $_SESSION["username"] = $userExists["username"];
        header("location: ../index.php");
        exit();
    }

}