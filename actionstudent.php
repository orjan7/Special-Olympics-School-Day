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
    else if ($fnamn  === ''){
        echo "<script type='text/javascript'>
                alert('Du måste skriva in ett förnamn');
                window.history.back(-1);
            </script>";
    }
    else if ($lnamn  === ''){
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
        
        $insert1 = "INSERT INTO athletes (schoolNumber, stage, firstName, lastName, startNumber, disabilities, photo) 
        VALUES ('$school','$stage','$fnamn','$lnamn','$startNumber','$disabilities','$photo')";
        
        if ($mysqli -> query($insert1) === TRUE) {
            $insert2 = "INSERT INTO branch (startNumberA, ".implode (',', $b).") VALUES ('$startNumber',".implode(',', $x).")";
            
            if ($mysqli -> query($insert2) === FALSE) {
                $delete1 = "DELETE FROM athletes WHERE startNumber=$startNumber";

                if ($mysqli -> query($delete1) === FALSE) {
                    echo "Delete error: ". $mysqli->error;
                }
                if ($mysqli -> query($insert2) === FALSE) {
                    echo implode (',', $b),$mysqli->error;
                }
            }
            else {
                echo "<script type='text/javascript'>
                            alert('$fnamn $lnamn är nu inlagd');
                            window.location='addstudent.php';
                        </script>";
            }
        }
        else {
            echo "Fel: " . $connect->error;
        }
    }
}
else {
    echo 'Något gick fel';
}
?>