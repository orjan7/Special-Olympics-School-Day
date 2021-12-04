<?php
require 'header.php';

$query1 = "SELECT * FROM school ORDER BY city ASC";
$result1 = $mysqli -> query($query1);

$query2 = "SELECT startNumber FROM athletes";
$result2 = $mysqli -> query($query2);

if (mysqli_num_rows($result2) <=0) {
    $sNr = '0';
}
else {
    while ($row = mysqli_fetch_array($result2)) {
        $nr[] = $row['startNumber'];
    }
}

$query3 = "SELECT * FROM startNumber WHERE startNumber NOT IN (".implode(",", $nr).") LIMIT 1";
$result3 = $mysqli -> query($query3);

$query4 = "SELECT * FROM branchHeader ORDER BY sortNr ASC";
$result4 = $mysqli -> query($query4);
// Add student
    echo $nl.$tab.'<div class="container ml-0 mt-2">'.$nl;
        echo $tab.$tab.'<h4>Lägg till en elev</h4>'.$nl;
        echo $tab.$tab.'<form action="actionstudent.php" method="post">'.$nl;
        echo $tab.$tab.$tab.'<div class="col-5">'.$nl;
            echo $tab.$tab.$tab.$tab.'<div class="col">'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<select class="form-control form-control-sm" name="school">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.$tab.'<option>Skola</option>'.$nl;
                
                        while ($row = mysqli_fetch_array($result1)) {
                            echo $tab.$tab.$tab.$tab.$tab.$tab."<option value=".$row["idSchool"].">".$row['city']." ".$row['school']."</option>".$nl;
                        }
                
                    echo $tab.$tab.$tab.$tab.$tab.'</select>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>Startnummer</label>'.$nl;
                    
                        while ($row = mysqli_fetch_array($result3)) {
                            echo $tab.$tab.$tab.$tab.$tab.'<input type="number" class="form-control" name="startNumber" value="'.$row["startNumber"].'">'.$nl;
                        }
                    
                    echo $tab.$tab.$tab.$tab.$tab.'<label>Förnamn</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<input type="text" class="form-control" name="fnamn">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>Efternamn</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<input type="text" class="form-control" name="lnamn">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>Stadium</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<div class="form-group">'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<label>L</label>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="stage" value="L">'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<label>M</label>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="stage" value="M">'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<label>H</label>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="stage" value="H">'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<label>G</label>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="stage" value="G">'.$nl;
                echo $tab.$tab.$tab.$tab.'</div>'.$nl;
                echo $tab.$tab.$tab.$tab.'<label>Skada</label>'.$nl;
                echo $tab.$tab.$tab.$tab.'<div class="form-group">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>R</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="disabilities" value="R">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>S</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="disabilities" value="S">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>U</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<input type="radio" name="disabilities" value="U">'.$nl;
                echo $tab.$tab.$tab.$tab.'</div>'.$nl;
                echo $tab.$tab.$tab.$tab.'<div class="form-group">'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<label>Eleven får inte fotas</label>'.$nl;
                    echo $tab.$tab.$tab.$tab.$tab.'<input type="checkbox" name="photo" value="Ej fotas">'.$nl;
                echo $tab.$tab.$tab.$tab.'</div>'.$nl;
                echo $tab.$tab.$tab.'</div>'.$nl;
                
                    while ($row = $result4->fetch_assoc()) {
                        $branch[] = $tab.$tab.$tab.$tab.$tab.'<th class="nowrap">'.$row['branch'].'</th>'.$nl;
                        $checkbranch[] = $tab.$tab.$tab.$tab.$tab.'<td><input type="checkbox" name="branch[]" value="'.$row['branch'].'"></td>'.$nl;
                    }
                echo $tab.$tab.$tab.'<table class="table">'.$nl;
                    echo $tab.$tab.$tab.$tab.'<thead>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<tr>'.$nl;
                            echo implode("", $branch);
                        echo $tab.$tab.$tab.$tab.$tab.'</tr>'.$nl;
                    echo $tab.$tab.$tab.$tab.'</thead>'.$nl;
                    echo $tab.$tab.$tab.$tab.'<tbody>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<tr>'.$nl;
                            echo implode("", $checkbranch);
                        echo $tab.$tab.$tab.$tab.$tab.'</tr>'.$nl;
                    echo $tab.$tab.$tab.$tab.'</tbody>'.$nl;
                echo $tab.$tab.$tab.'</table>'.$nl;
                echo $tab.$tab.$tab.'<input type="submit" onclick="addstudent()" name="Spara" value="Spara">'.$nl;
            echo $tab.$tab.'</div>'.$nl;
            echo $tab.'</form>'.$nl;
    echo '</div>'.$nl;
require 'footer.php';
?>