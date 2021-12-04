<?php
require 'header.php';

$query1 = "SELECT * FROM school ORDER BY city ASC";
$result1 = $mysqli -> query($query1);

echo '<div class="container ml-1 mt-1">'.$nl;
    echo $tab.'<div class="row">'.$nl;
        echo $tab.$tab.'<div class="col-4">'.$nl;
            echo $tab.$tab.$tab.'<h4>Nuvarande skolor</h4><br>'.$nl;
        echo $tab.$tab.'</div>'.$nl;
        echo $tab.$tab.'<div class="col-4">'.$nl;
            echo $tab.$tab.$tab.'<h4>Lägg till en skola</h4><br>'.$nl;
        echo $tab.$tab.'</div>'.$nl;
    echo $tab.'</div>'.$nl;
    echo $tab.'<div class="row">'.$nl;
        echo $tab.$tab.'<div class="col-4 bg-secondary text-white">'.$nl;
            while ($row = mysqli_fetch_array($result1)) {
                echo $tab.$tab.$tab.'<small>'.$row['city'].' '.$row['school'].'</small><br>'.$nl;
            }
        echo $tab.$tab.'</div>'.$nl;
        echo $tab.$tab.'<div class="col-4">'.$nl;
                echo $tab.$tab.$tab.$tab.'<label>Ort</label>'.$nl;
                echo $tab.$tab.$tab.$tab.'<input type="text" class="form-control" name="city">'.$nl;
                echo $tab.$tab.$tab.$tab.'<label>Skola</label>'.$nl;
                echo $tab.$tab.$tab.$tab.'<input type="text" class="form-control mb-2" name="school">'.$nl;
                echo $tab.$tab.$tab.$tab.'<button type="submit" name="saveSchool">Spara</button>'.$nl;
            echo $tab.$tab.$tab.'</form>'.$nl;
        echo $tab.$tab.'</div>'.$nl;
    echo $tab.'</div">'.$nl;
echo '</div>'.$nl;
require 'footer.php';
?>