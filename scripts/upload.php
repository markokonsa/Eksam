<?php

require_once('functions.php');
session_start();
connect_db();

global $connection;

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
    if ($_FILES["userfile"]["size"] > 5000000) {
        die("Sorry, your file is too large.");
    }

    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
    $imageFileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    $query = "INSERT INTO mkonsa_eksam_upload (name, size, type, content ) ".
        "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

    mysqli_query($connection, $query) or die('Error, query failed');
}

header("Location: /~mkonsa/Eksam/index.php");

?>