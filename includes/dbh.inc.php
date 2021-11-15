<?php
$severname  =   "localhost";
$username   =   "root";
$password   =   "root";
$dbname     =   "sosd2020";

// Create connection
$mysqli = new mysqli($severname, $username, $password, $dbname);

mysqli_set_charset($mysqli, "utf8");

if ($mysqli -> connect_errno) {
    echo "Connection faild: ".$mysqli -> connect_error;
}
?>