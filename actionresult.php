<?php
require 'header.php';
if (isset($_POST['save'])) {
    $startnr = $_POST['startnr'];
    $branch = $_POST['branch'];
    $resultOne = $_POST['resultOne'];
    $resultTwo = $_POST['resultTwo'];
    $replaceBranch = str_replace(' ', '_', $branch);
    $insert1 = "INSERT INTO R_$replaceBranch (startNumberR, resultOne, resultTwo) 
        VALUES ('$startnr','$resultOne','$resultTwo')";

    if ($connect->query($insert1) === FALSE) {
        echo "Delete error: ". $connect->error;
    }
    else {
        echo "<script type='text/javascript'>
                            alert('Resultatet är nu inlagd');
                            window.location='result.php?branch=$branch';
                        </script>";
    }
}

if (isset($_POST['update'])) {
    $startnr = $_POST['startnr'];
    $branch = $_POST['branch'];
    $resultOne = $_POST['resultOne'];
    $resultTwo = $_POST['resultTwo'];
    $replaceBranch = str_replace(' ', '_', $branch);
    $res1 = 'r' .$replaceBranch. 'One';
    $res2 = 'r' .$replaceBranch. 'Two';
    // echo 'Start.nr: '.$startnr.' Gren: '.$replaceBranch.' Resultat 1: '.$resultOne.' Resultat 2: '.$resultTwo;
    // echo $res1.': '.$resultOne.'<br/>'.$res2.': '.$resultTwo;
    $insert2 = "UPDATE Result SET $res1='$resultOne', $res2='$resultTwo' WHERE startNumberR=$startnr";

    if ($connect->query($insert2) === FALSE) {
        echo "Delete error: ". $connect->error;
    }
    else {
        echo "<script type='text/javascript'>
                            alert('Resultatet är nu uppdaterad');
                            window.location='result.php?branch=$gren';
                        </script>";
    }
}

?>