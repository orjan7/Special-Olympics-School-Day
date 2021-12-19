<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'includes/dbh.inc.php';
$nl = chr(10);
$tab = chr(9);
$ntab =chr(-9);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Örjan Andersson">
    <meta name="description" content="Special Olympics School Day i Västerbotten.">
    <meta name="keywords" content="Parasport, Skoltävling, friidrott, Funktionsvariationer, Umeå, Västerbotten, Aktiviteter, Nolia">
    <title>Special Olympics School Day</title>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="includes/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/mall.css" />
</head>
<body>
<?php require 'navbar.php'?>