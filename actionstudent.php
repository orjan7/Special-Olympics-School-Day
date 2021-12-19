<?php
require 'header.php';
if (isset($_POST['Spara'])) {
    $school = $_POST['school'];
    $startNumber = $_POST['startNumber'];
    $fnamn = $_POST['fnamn'];
    $lnamn = $_POST['lnamn'];
    $disabilities = $_POST['disabilities'];
    if (!isset($_POST['stage'])) {
        $stage = ' ';
    }
    else {
        $stage = $_POST['stage'];
    }
    if (!isset($_POST['photo'])) {
        $photo= ' ';
    }
    else {
        $photo = 'Ej fotas';
    }
    if ($school === 'Skola'){
        echo "<script type='text/javascript'>
                alert('Du måste välja en skola');
                window.history.back(-1);
            </script>";
    }
    else if (empty($fnamn)){
        echo "<script type='text/javascript'>
                alert('Du måste skriva in ett förnamn');
                window.history.back(-1);
            </script>";
    }
    else if (empty($lnamn)){
        echo "<script type='text/javascript'>
                alert('Du måste skriva in ett efternamn');
                window.history.back(-1);
            </script>";
    }
    else if (!isset($_POST['branch'])) {
        echo "<script type='text/javascript'>
                alert('Du måste bocka in minst en gren');
                window.history.back(-1);
            </script>";
    }
    else {
        foreach ($_POST['branch'] as $key => $value) {
            $b[] = '`'.$value.'`';
            $x[] = "'1'";
        }
        $fnamn = mysqli_real_escape_string($mysqli, $fnamn);
        $lname = mysqli_real_escape_string($mysqli, $lname);
        
        $insert1 = "INSERT INTO athletes (schoolNumber, stage, firstName, lastName, startNumber, disabilities, photo) 
        VALUES ('$school','$stage','$fnamn','$lnamn','$startNumber','$disabilities','$photo')";
        $insert2 = "INSERT INTO branch (startNumberA, ".implode (',', $b).") VALUES ('$startNumber',".implode(',', $x).")";
        $insert3 = "INSERT INTO Result (startNumberR) VALUES ('$startNumber')";
        if ($mysqli -> query($insert1)) {
            if ($mysqli -> query($insert2)) {
                if ($mysqli -> query($insert3)) {
                    echo "<script type='text/javascript'>
                            alert('$fnamn $lnamn är nu inlagd');
                            window.location='addstudent.php';
                        </script>";
                } else {
                    echo "Insert result error ". $mysqli->error;
                }
            } else {
                echo "Insert branch error ". $mysqli->error;
            }
        } else {
            echo "Insert athletes error ". $mysqli->error;
        }
    }
}
else {
    echo 'Något gick fel';
}
?>