<?php
$severname  =   "localhost";
$username   =   "orjanis";
$password   =   "!T1llb4k4";
$dbname     =   "sosd2020";
// Create connection
$connect =  mysqli_connect($severname, $username, $password, $dbname);
$mysqli = new mysqli($severname, $username, $password, $dbname);
mysqli_set_charset($mysqli, "utf8");
// Check connection
if (!$connect){
    die("Connection faild: ".mysqli_connect_error());
}
if ($mysqli -> connect_errno) {
    echo "Connection faild: ".$mysqli -> connect_error;
}
?>