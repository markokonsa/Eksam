<?php
require_once('scripts/functions.php');
session_start();
connect_db();

global $connection;
$sql = "SELECT COUNT(*) as numOfImages FROM mkonsa_eksam_upload;";
$result = mysqli_query($connection , $sql) or die(mysqli_error($connection));
$mitu = $result->fetch_array(MYSQLI_ASSOC);

include_once('views/index.html');

?>