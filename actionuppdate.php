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
    $firstName = mysqli_real_escape_string($mysqli, $firstName);
    $lastName = mysqli_real_escape_string($mysqli, $lastName);

    $delete1 = "DELETE FROM branch WHERE startNumberA='$startNumber'";
    
    if (!$mysqli -> query($delete1)) {
        echo "<script type='text/javascript'>
            alert('Kunde inte ta bort grenarna');
            window.location='".$fromSite."';
        </script>";
    } else {
        $mess1 = "<script type='text/javascript'>
                    alert('Uppgifterna till deltagaren med startnummer: $startNumber är nu uppdaterad.');
                    window.location='".$fromSite."';
                </script>";
        $sql1 = "INSERT INTO branch (startNumberA, ".implode (',', $b).") VALUES ('$startNumber',".implode(',', $x).")";
        $sql2 = "UPDATE athletes SET schoolNumber='$school', stage='$stage', firstName='$firstName', lastName='$lastName', disabilities='$disabilities', photo='$photo' WHERE startNumber='$startNumber'";
        $sql3 = "SELECT * FROM Result WHERE startNumberR=$startNumber";
        $result3 = $mysqli -> query($sql3);
        $count3 = mysqli_num_rows($result3);

        if ($mysqli -> query($sql1)) {
            if ($mysqli -> query($sql2)) {                        
                if (in_array('Stafett', $_POST['checkbox'])) {
    
                    $sql4 = "SELECT * FROM R_Stafett WHERE idSchoolR = '$school'";
                    $result4 = $mysqli -> query($sql4);
                    $count4 = mysqli_num_rows($result4);
                    
                    if ($count4 === 0) {
                        $sql5 = "INSERT INTO R_Stafett (idSchoolR) VALUE ('$school')";
                        if ($mysqli -> query($sql5) === FALSE) {
                            echo "Error: ". $sql5 . "<br>" . $mysqli->error;
                        } else {
                            echo $mess1;
                        }
                    }
                } else {
                    $sql6 = "SELECT * FROM R_Stafett WHERE idSchoolR = '$school'";
                    $result6 = $mysqli -> query($sql6);
                    $count6 = mysqli_num_rows($result6);
                     
                    if ($count6 === 1) {
                        $delete6 = "DELETE FROM R_Stafett WHERE idSchoolR = '$school'";
                        if ($mysqli -> query($delete6)) {
                            echo $mess1;
                        }
                    }
                }
                if (in_array('Unified', $_POST['checkbox'])) {
    
                    $sql7 = "SELECT * FROM R_Unified WHERE idSchoolR = '$school'";
                    $result7 = $mysqli -> query($sql7);
                    $count7 = mysqli_num_rows($result7);
                    
                    if ($count7 === 0) {
                        $sql8 = "INSERT INTO R_Unified (idSchoolR) VALUE ('$school')";
                        if ($mysqli -> query($sql8) === FALSE) {
                            echo "Error: ". $sql8 . "<br>" . $mysqli->error;
                        } else {
                            echo $mess1;
                        }
                    }
                } else {
                    $sql9 = "SELECT * FROM R_Unified WHERE idSchoolR = '$school'";
                    $result9 = $mysqli -> query($sql9);
                    $count9 = mysqli_num_rows($result9);
                     
                    if ($count10 === 1) {
                        $delete10 = "DELETE FROM R_Unified WHERE idSchoolR = '$school'";
                        if ($mysqli -> query($delete10)) {
                            echo $mess1;
                        }
                    }
                }
                if (in_array('Innebandy', $_POST['checkbox'])) {
    
                    $sql11 = "SELECT * FROM R_Innebandy WHERE idSchoolR = '$school'";
                    $result11 = $mysqli -> query($sql11);
                    $count11 = mysqli_num_rows($result11);
                    
                    if ($count11 === 0) {
                        $sql12 = "INSERT INTO R_Innebandy (idSchoolR) VALUE ('$school')";
                        if ($mysqli -> query($sql12) === FALSE) {
                            echo "Error: ". $sql12 . "<br>" . $mysqli->error;
                        } else {
                            echo $mess1;
                        }
                    }
                } else {
                    $sql13 = "SELECT * FROM R_Innebandy WHERE idSchoolR = '$school'";
                    $result13 = $mysqli -> query($sql13);
                    $count13 = mysqli_num_rows($result13);
                     
                    if ($count13 === 1) {
                        $delete14 = "DELETE FROM R_Innebandy WHERE idSchoolR = '$school'";
                        if ($mysqli -> query($delete14)) {
                            echo $mess1;
                        }
                    }
                }
                if ($count3 === 0) {
                    $sql4 = "INSERT INTO Result (startNumberR) VALUES ('$startNumber')";
                    if ($mysqli -> query($sql4)) {
                        echo $mess1;
                    }
                }
                echo $mess1;
            }
        }
    }
} 
?>