<?php
require 'header.php';
require 'includes/branch.php';
$scoolStage = array('L','M','H','G');

$sql1 = "SELECT * FROM school INNER JOIN athletes ON school.idSchool=athletes.schoolNumber INNER JOIN branch ON athletes.startNumber=branch.startNumberA WHERE athletes.startNumber=1";
$result1 = $mysqli -> query($sql1);


while ($row3 = mysqli_fetch_array($result1)) {
    echo '<select name="stage">';
    foreach ($scoolStage as $value) {
        // echo $row3["stage"];
        if ($row3["stage"] == $value) {
            echo '<option selected="selected" value="'.$row3["stage"].'">'.$row3["stage"].'</option>'.$nl;
        } else {
            echo '<option value="'.$value.'">'.$value.'</option>';
        }
    }
    echo '</select>';
}

require 'footer.php';
?>