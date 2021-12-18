<?php
require 'header.php';

if (isset($_POST['saveSchool'])) {
    $city = $_POST['city'];
    $school = $_POST['school'];
    if (empty($city)){
        echo "<script type='text/javascript'>
                alert('Du måste skriva in en ort');
                window.history.back(-1);
            </script>";
    } elseif (empty($school)) {
        echo "<script type='text/javascript'>
                alert('Du måste skriva in en skola');
                window.history.back(-1);
            </script>";
    } else {
        $sql1 = "SELECT * FROM school WHERE school = $school";

        if ($mysqli -> query($sql1)) {
            echo $school.' är redan inlagd';
        } else {
            $sql2 = "INSERT INTO school (city, school)
            VALUES ('$city','$school')";

            if ($mysqli -> query($sql2) === TRUE) {
                echo "<script type='text/javascript'>
                        alert('$school i $city är nu inlagd');
                        window.location='addschool.php';
                    </script>";
            }
            else {
                echo "Det blev något som gick fel: ".$sql."</br>".$mysqli->error;
            }
        }
    }  
}
else {
    echo 'Du måste trycka på spara';
}
?>