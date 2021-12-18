<?php
require 'header.php';
$branch = $_GET['branch'];
$replace = str_replace(' ', '_', $branch);
$res1 = 'r' .$replace. 'One';
$res2 = 'r' .$replace. 'Two';
$fromSite = $_GET['site'];
$id = $_GET['id'];

$sql1 = "UPDATE branch SET `$branch` = NULL WHERE startNumberA = $id";
$sql2 = "UPDATE Result SET `$res1` =  NULL, `$res2` = NULL WHERE startNumberR = $id";
print_r($sql1);
if ($mysqli -> query($sql1)) {
    if ($mysqli -> query($sql2)) {
        echo "<script type='text/javascript'>
            window.location='editstudent.php?editstudent=".$id."&startNumber=".$id."&site=".$fromSite."';
        </script>";
    } else {
        echo 'sql 2 '.$mysqli->error;
    }
} else {
    echo 'sql 1 '.$mysqli->error;
}
?>