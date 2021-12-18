<?php
require 'header.php';

if (isset($_POST['Spara'])) {
    $startNumber = $_POST['startNumber'];

    $query = "SELECT startNumber FROM startNumber WHERE startNumber = '$startNumber'";
    $result = $connect->query($query);
    
    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>
                alert('Startnummret: $startNumber är redan inlagd');
                window.history.back(-1);
            </script>";
    }
    else {
        $insert = "INSERT INTO startNumber (startNumber)
            VALUES ('$startNumber')";

        if ($connect->query($insert) === TRUE) {
            echo "<script type='text/javascript'>
                    alert('Startnummret: $startNumber är nu inlagd');
                    window.location='addstartnr.php';
                </script>";
        }
        else {
            echo "Error: ".$insert."</br>".$connect->error;
        }
    }
}
?>