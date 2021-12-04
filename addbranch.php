<?php
require 'header.php';

$sql1 = "SELECT * FROM branchHeader ORDER BY sortNr ASC";
$result1 = $mysqli -> query($sql1);
$sql_2 = "SELECT * FROM branchHeader ORDER BY sortNr DESC LIMIT 1";
$result_2 = $mysqli -> query($sql_2);

echo '<div class="container ml-1 mt-1">'.$nl;
    echo $tab.'<div class="row">'.$nl;
        echo $tab.$tab.'<div class="col-4">'.$nl;
            echo $tab.$tab.$tab.'<h4>Nuvarande grenare</h4>'.$nl;
        echo $tab.$tab.'</div>'.$nl;
        echo $tab.$tab.'<div class="col-4">'.$nl;
            echo $tab.$tab.$tab.'<h4>Lägg till en gren</h4>'.$nl;
        echo $tab.$tab.'</div>'.$nl;
    echo $tab.'</div>'.$nl;
    echo $tab.'<div class="row">'.$nl;
        echo $tab.$tab.'<div class="col-4 bg-secondary text-white">'.$nl;
            while ($row = mysqli_fetch_array($result1)) {
                echo $tab.$tab.$tab.'<small>'.$row['branch'].'</small><br>'.$nl;
            }
            while ($row2 = mysqli_fetch_array($result_2)) {
                $countRow[] = $row2['sortNr'];
            }
        echo $tab.$tab.'</div>'.$nl;
        echo $tab.$tab.'<div class="col-4">'.$nl;
            echo $tab.$tab.$tab.'<form action="actionbranch.php" method="post">'.$nl;
                echo $tab.$tab.$tab.$tab.'<label>Gren</label>'.$nl;
                echo $tab.$tab.$tab.$tab.'<input type="hidden" class="form-control" name="lastnr" value="'.implode("",$countRow).'">'.$nl;
                echo $tab.$tab.$tab.$tab.'<input type="text" class="form-control mb-2" name="branch">'.$nl;
                echo $tab.$tab.$tab.$tab.'<button type="submit" name="SaveBranch">Spara</button>'.$nl;
                echo $tab.$tab.$tab.'</form>'.$nl;
        echo $tab.$tab.'</div>'.$nl;
    echo $tab.'</div>'.$nl;
echo '</div>'.$nl;
require 'footer.php';
?>