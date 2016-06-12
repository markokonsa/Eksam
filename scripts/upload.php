<?php

global $connection;
$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- " . mysqli_error());
mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - " . mysqli_error($connection));

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
    header("Location: /~mkonsa/Eksam/index.php");
}
?>