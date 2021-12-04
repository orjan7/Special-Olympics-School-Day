<?php
require 'header.php';
require 'resnavbar.php';
if (isset($_POST['Spara'])) {
    $schoolTeam = $_POST['schoolTeam'];
    $ressultFrom = $_POST['result'];
    $toBranch = $_POST['branch'];
    echo 'Resultat: '.$ressultFrom.' Till gren R_'.$toBranch.' Skollag '.$schoolTeam.'<br>';
    $sql1 = "SELECT idSchoolR FROM R_$toBranch WHERE idSchoolR = '$schoolTeam'";
    $result1 = $mysqli -> query($sql1);
    $numberOfRow = mysqli_num_rows($result1);    
    
    if ($numberOfRow === 0) {
        $insert1 = "INSERT INTO R_$toBranch (idSchoolR, result)
        VALUES ('$schoolTeam','$ressultFrom')";

        if ($mysqli -> query($insert1) === TRUE) {
            echo "<script type='text/javascript'>
                            alert('Resultatet för laget är nu inlagd');
                            window.location='result.php?branch=$toBranch';
                        </script>";
        } else {
            echo "Error: ". $insert1 . "<br>" . $mysqli->error;
        }
    } else {
        $update1 = "UPDATE R_$toBranch SET result='$ressultFrom' WHERE idSchoolR='$schoolTeam'";
    
        if ($mysqli -> query($update1) === TRUE) {
            echo "<script type='text/javascript'>
                            alert('Resultatet för laget $schoolTeam är nu inlagd');
                            window.location='result.php?branch=$toBranch';
                        </script>";
        } else {
            echo "Error: ". $update1 . "<br>" . $mysqli->error;
        }
    }
}
?>