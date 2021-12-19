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
        // echo 'INSERT INTO branch '. implode(',', $b).'VALUE '. implode(',', $x);
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
    
                    $sql5 = "SELECT * FROM R_Stafett WHERE idSchoolR = '$school'";
                    $result1 = $mysqli -> query($sql5);
                    $count1 = mysqli_num_rows($result1);
                    
                    if ($count1 === 0) {
                        $sql6 = "INSERT INTO R_Stafett (idSchoolR) VALUE ('$school')";
                        if ($mysqli -> query($sql6) === FALSE) {
                            echo "Error: ". $sql6 . "<br>" . $mysqli->error;
                        } else {
                            echo $mess1;
                        }
                    }
                } else {
                    $sql7 = "SELECT * FROM R_Stafett WHERE idSchoolR = '$school'";
                    $result2 = $mysqli -> query($sql7);
                    $count2 = mysqli_num_rows($result2);
                     
                    if ($count2 === 1) {
                        $delete1 = "DELETE FROM R_Stafett WHERE idSchoolR = '$school'";
                        if ($mysqli -> query($delete1)) {
                            echo $mess1;
                        }
                    }
                }
                if (in_array('Unified', $_POST['checkbox'])) {
    
                    $sql8 = "SELECT * FROM R_Unified WHERE idSchoolR = '$school'";
                    $result3 = $mysqli -> query($sql8);
                    $count3 = mysqli_num_rows($result3);
                    
                    if ($count3 === 0) {
                        $sql9 = "INSERT INTO R_Unified (idSchoolR) VALUE ('$school')";
                        if ($mysqli -> query($sql9) === FALSE) {
                            echo "Error: ". $sql9 . "<br>" . $mysqli->error;
                        } else {
                            echo $mess1;
                        }
                    }
                } else {
                    $sql10 = "SELECT * FROM R_Unified WHERE idSchoolR = '$school'";
                    $result4 = $mysqli -> query($sql10);
                    $count4 = mysqli_num_rows($result4);
                     
                    if ($count4 === 1) {
                        $delete2 = "DELETE FROM R_Unified WHERE idSchoolR = '$school'";
                        if ($mysqli -> query($delete2)) {
                            echo $mess1;
                        }
                    }
                }
                if (in_array('Innebandy', $_POST['checkbox'])) {
    
                    $sql11 = "SELECT * FROM R_Innebandy WHERE idSchoolR = '$school'";
                    $result5 = $mysqli -> query($sql11);
                    $count5 = mysqli_num_rows($result5);
                    
                    if ($count5 === 0) {
                        $sql12 = "INSERT INTO R_Innebandy (idSchoolR) VALUE ('$school')";
                        if ($mysqli -> query($sql12) === FALSE) {
                            echo "Error: ". $sql12 . "<br>" . $mysqli->error;
                        } else {
                            echo $mess1;
                        }
                    }
                } else {
                    $sql13 = "SELECT * FROM R_Innebandy WHERE idSchoolR = '$school'";
                    $result6 = $mysqli -> query($sql13);
                    $count6 = mysqli_num_rows($result13);
                     
                    if ($count6 === 1) {
                        $delete3 = "DELETE FROM R_Innebandy WHERE idSchoolR = '$school'";
                        if ($mysqli -> query($delete3)) {
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