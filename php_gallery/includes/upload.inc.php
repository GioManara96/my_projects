<?php
if (isset($_POST["upload"])) {
    include "functions.inc.php";
    require "dbconnection.inc.php";
    createGalleryTable($conn);

    $file = $_FILES["file"];
    $fileName = $file["name"];
    $fileFullPath = $file["full_path"];
    $fileType = $file["type"];
    $fileTmpName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    if(!$_POST["fileName"]){
        $fileNewName = "gallery";
    } else{
        $fileNewName = strtolower(str_replace(" ", "-", $_POST["fileName"]));
    }
    $imageTitle = $_POST["imageTitle"];
    $imageDescr = $_POST["imageDescr"];

    if(emptyInputUpload($imageTitle, $imageDescr)){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    uploadImage($file, $fileNewName, $imageTitle, $imageDescr);
} else{
    header("location: ../index.php?error=badconn");
    exit();
}
