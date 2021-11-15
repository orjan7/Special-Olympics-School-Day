<?php
require 'header.php';

if (isset($_POST['Spara'])) {
    $lastnr = $_POST['lastnr'];
    $branch = $_POST['branch'];
    $sql = "SELECT branch FROM branchHeader WHERE branch LIKE '%$branch%'";
    $result = $mysqli -> query($sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        echo "<script type='text/javascript'>
                         alert('Grenen $branch är redan inlagd. Ange en anna gren.');
                         window.location='addbranch.php';
                     </script>";
    }        
    else {        
        $sql1 = "ALTER TABLE branch ADD `$branch` TINYINT";
        
            if ($sql1) 
            {
                $sql2= "INSERT INTO branchHeader (sortNr, branch)
                VALUES ('$lastnr','$branch')";

                if ($connect->query($sql2) == TRUE) {
                    echo "<script type='text/javascript'>
                            alert('$branch är nu inlagd');
                            window.location='addbranch.php';
                        </script>";
                }
                else {
                    echo "Det blev något som gick fel: ".$sql2."</br>".$connect->error;
                }
            } else {
                echo 'Error: '. $sql1 .'<br/>'. $connect->error;
            }

        if ($sql1) {
            
        }
        else {
            echo "Det blev något som gick fel: ".$sql1."</br>".$connect->error;
        }
    }
}
else {
    echo 'Du måste trycka på spara';
}
?>