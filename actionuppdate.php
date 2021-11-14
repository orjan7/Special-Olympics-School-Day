<?php
require 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['Spara'])) {
    $school = $_POST['school'];
    $stage = $_POST['stage'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $startNumber = $_POST['startNumber'];
    $disabilities = $_POST['disabilities'];
    $update = $_POST['update'];
    $fromSite = $_POST['site'];
    echo $fromSite;
    if (!isset($_POST['photo'])){
        $photo = '';
    }
    else {
        $photo = 'Ej fotas';
    }
    foreach ($_POST['checkbox'] as $key => $value) {
        $b[] = '`'.$value.'`';
        $x[] = "'1'";
        
    }
    
    $delete1 = "DELETE FROM branch WHERE startNumberA='$startNumber'";
    
    if (!$mysqli -> query($delete1)) {
        echo "<script type='text/javascript'>
            alert('Kunde inte ta bort grenarna');
            window.location='".$fromSite."';
        </script>";
    } else {
        $mess1 = "<script type='text/javascript'>
                    alert('Uppgifterna till deltagaren med startnummer: $startNumber är nu uppdaterad 1.');
                    window.location='".$fromSite."';
                </script>";
        $sql1 = "INSERT INTO branch (startNumberA, ".implode (',', $b).") VALUES ('$startNumber',".implode(',', $x).")";
        $sql2 = "UPDATE athletes SET schoolNumber='$school', stage='$stage', firstName='$firstName', lastName='$lastName', disabilities='$disabilities', photo='$photo' WHERE startNumber='$startNumber'";
        $sql3 = "SELECT * FROM Result WHERE startNumberR=$startNumber";
        if ($mysqli -> query($sql1)) {
            if ($mysqli -> query($sql2)) {                
                if ($mysqli -> query($sql3)) {
                    if ($r === 0) {
                        $sql4 = "INSERT INTO Result (startNumberR) VALUES ('$startNumber')";
                            echo $mess1;
                    }
                    else {
                        if (in_array('Stafett', $_POST['checkbox'])) {
                            $sql5 = "SELECT * FROM R_Stafett WHERE idSchool = '$school'";
                            if ($mysqli -> query($sql5)) {
                                $sql6 = "UPDATE R_Stafett SET athletes = CONCAT(athletes, ' $firstName',' $lastName') WHERE idSchool = '$school'";
                                if ($mysqli -> query($sql6)) {
                                    echo $mess1;
                                }
                            } else {
                                $sql6 = "INSERT INTO R_Stafett (idSchool, athletes) VALUE ('$school','$firstName $lastName')";
                                if ($mysqli -> query($sql6) === FALSE) {
                                    echo "Error: ". $sql6 . "<br>" . $mysqli->error;
                                } else {
                                    echo $mess1;
                                }
                            }
                        } else {
                            $sql7 = "SELECT * FROM R_Stafett WHERE idSchool = '$school' AND `athletes` LIKE '%%$firstName%%'";
                            if ($mysqli -> query($sql7)) {
                                $sql8 = "UPDATE R_Stafett SET athletes = replace(athletes, '$firstName $lastName', '' ) WHERE idSchool = '$school'";
                                if ($mysqli -> query($sql8)) {
                                    echo $mess1;
                                }
                            }
                        }
                        echo $mess1; 
                    }
                }
            }
        }
    }
} 
?>