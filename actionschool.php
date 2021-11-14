<?php
require 'header.php';

if (isset($_POST['Spara'])) {
    $city = $_POST['city'];
    $school = $_POST['school'];

    $sql = "INSERT INTO school (city, school)
            VALUES ('$city','$school')";

            if ($connect->query($sql) === TRUE) {
                echo "<script type='text/javascript'>
                        alert('$school i $city är nu inlagd');
                        window.location='addschool.php';
                    </script>";
            }
            else {
                echo "Det blev något som gick fel: ".$sql."</br>".$connect->error;
            }
}
else {
    echo 'Du måste trycka på spara';
}
?>