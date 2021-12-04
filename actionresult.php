<?php
require 'header.php';
if (isset($_POST['save'])) {
    $startnr = $_POST['startnr'];
    $branch = $_POST['branch'];
    $resultOne = $_POST['resultOne'];
    $resultTwo = $_POST['resultTwo'];
    $replaceBranch = str_replace(' ', '_', $branch);
    $res1 = 'r' .$replaceBranch. 'One';
    $res2 = 'r' .$replaceBranch. 'Two';

    $selectCheck = "SELECT * FROM Result WHERE startNumberR=$startnr";
    $result = $mysqli -> query($selectCheck);
    
    if ($result->num_rows === 0) {
        $insert1 = "INSERT INTO Result (startNumberR, $res1, $res2) 
        VALUES ('$startnr','$resultOne','$resultTwo')";
        if ($mysqli -> query($insert1)) {
            echo "<script type='text/javascript'>
                    alert('Resultatet är nu inlagd');
                    window.location='result.php?branch=$branch';
                </script>";
        } else {
            echo "Insert result error ". $mysqli->error;
        }
    } else {
        $insert2 = "UPDATE Result SET $res1='$resultOne', $res2='$resultTwo' WHERE startNumberR=$startnr";

        if ($mysqli -> query($insert2)) {
            echo "<script type='text/javascript'>
                    alert('Resultatet är nu uppdaterad');
                    window.location='result.php?branch=$branch';
                </script>";
        } else {
            echo "Update result error ". $mysqli->error;
        }
    }
}
?>