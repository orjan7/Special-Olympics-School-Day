<?php
require 'header.php';
// test
if (isset($_POST['SaveBranch'])) {
    $lastnr = $_POST['lastnr'];
    $branch = $_POST['branch'];
    $replaceBranch = str_replace(' ', '_', $branch);
    $branch1 = 'r' .$replaceBranch. 'One';
    $branch2 = 'r' .$replaceBranch. 'Two';
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
        $lastnr + 1;
        $sql1 = "INSERT INTO branchHeader (sortNr, branch) VALUES ('$lastnr','$branch')";
        $sql2 = "ALTER TABLE branch ADD $branch TINYINT(1) NULL";
        $sql3 = "ALTER TABLE Result ADD COLUMN $branch1 TEXT NULL, ADD COLUMN $branch2 TEXT NULL";
        if ($mysqli -> query($sql1)) {
            if ($mysqli -> query($sql2)) {
                if ($mysqli -> query($sql3)) {
                    echo "<script type='text/javascript'>
                        alert('$branch är nu inlagd');
                        window.location='addbranch.php';
                    </script>";
                } else {
                    echo "Det blev något som gick fel: ".$sql3."</br>".$mysqli->error;
                }
            } else {
                echo "Det blev något som gick fel: ".$sql2."</br>".$mysqli->error;
            }
        } else {
            echo 'Det blev något som gick fel: '. $sql1 .'<br/>'. $mysqli->error;
        }
    }
}
else {
    echo 'Du måste trycka på spara';
}
?>