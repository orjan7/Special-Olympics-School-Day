<?php
require 'header.php';
require 'includes/branch.php';

if ($_GET['editstudent']=1) {
    $startnumber = $_GET['startNumber'];
    $fromSite = $_GET['site'];
    echo $fromSite;
    $sql1 = "SELECT * FROM school INNER JOIN athletes ON school.idSchool=athletes.schoolNumber INNER JOIN branch ON athletes.startNumber=branch.startNumberA WHERE athletes.startNumber=$startnumber";
    $result1 = $mysqli -> query($sql1);
    $numcountfields1 = mysqli_num_fields($result1);
    $fieldConunt = $numcountfields1-1;

    $sql2 = "SELECT * FROM school";
    $result2 = $mysqli -> query($sql2);

    $sql5 = "SELECT branch FROM branchHeader";
    $result5 = $mysqli -> query($sql5);
    $rowconunt5 = mysqli_num_rows($result5);
    
    $branchCheck = array();
    while ($row1 = mysqli_fetch_array($result5)) {
        $branchTh[] = $tab.$tab.$tab.$tab.$tab.'<th nowrap>'.$row1['branch'].'</th>'.$nl;
        $branchName[] = "'".$row1['branch']."'";
        $branchCheck[] = $row1['branch'];
    }
    $New_start_index = 13;
  
    $branchCheck = array_combine(range($New_start_index, 
    count($branchCheck) + ($New_start_index-1)),
    array_values($branchCheck));

    
    while ($row3 = mysqli_fetch_array($result1)) {
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><select name="school">'.$nl;
        while ($row1 = mysqli_fetch_array($result2)) {
            if ($row1["school"] == $row3[2]) {
                $student[] = $tab.$tab.$tab.$tab.$tab.'<option selected="selected" value="'.$row1["idSchool"].'">'.$row3[2].' '.$row1["idSchool"].'</option>'.$nl;
            }
            $student[] = $tab.$tab.$tab.$tab.$tab.'<option value="'.$row1["idSchool"].'">'.$row1["school"].' '.$row1["idSchool"].'</option>'.$nl;
        }
        $student[] = $tab.$tab.$tab.$tab.$tab.'<select></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="text" name="stage" value="'.$row3[5].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="text" name="firstName" value="'.$row3[6].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="text" name="lastName" value="'.$row3[7].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="hidden" name="startNumber" value="'.$row3[8].'">'.$row3[8].'</td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="text" name="disabilities" value="'.$row3[9].'"></td>'.$nl;
        if ($row3[10] == " ") {
            $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="checkbox" name="photo"></td>'.$nl;
        }
        else {
            $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="checkbox" name="photo" checked></td>'.$nl;
        }
        
        for ($y=13; $y <= $fieldConunt; $y++) { 
            
            if ($row3[$y] == 0) {
                $branch[] = $tab.$tab.$tab.$tab.$tab.'<td><input type="checkbox" name="checkbox[]" value="'.$branchCheck[$y].'"></td>'.$nl;
            }
            else {
                $branch[] = $tab.$tab.$tab.$tab.$tab.'<td><input type="checkbox" name="checkbox[]" value="'.$branchCheck[$y].'" checked></td>'.$nl;
            }
        }
    }
    echo $nl.'<form action="actionuppdate.php" method="post">'.$nl;
        echo $tab.'<div class="container ml-0">'.$nl;
            echo $tab.$tab.'<table class="table">'.$nl;
                echo $tab.$tab.$tab.'<thead>'.$nl;
                    echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2">Skola</th>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2">Nivå</th>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2">Förnamn</th>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2">Efternamn</th>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" nowrap>Start nr</th>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2">Skada</th>'.$nl;
                        echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2">Foto</th>'.$nl;
                    echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
                echo $tab.$tab.$tab.'</thead>'.$nl;
                echo $tab.$tab.$tab.'<tbody>'.$nl;
                    echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
                        echo implode('', $student);
                    echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
                    echo $tab.$tab.$tab.$tab.'<tr class="text-center ">'.$nl;
                        echo implode('', $branchTh);
                    echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
                    echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
                        echo implode('', $branch);
                    echo $tab.$tab.$tab.$tab.'</tr>';
                echo $tab.$tab.$tab.'</tbody>'.$nl;
            echo $tab.$tab.'</table>'.$nl;
            echo $tab.$tab.'<input type="hidden" name="numcountfields" value="'.$numcountfields1.'">'.$nl;
            if (empty($_GET['gren'])) {
                echo $tab.$tab.'<input type="hidden" name="update" value="1">'.$nl;
            }
            else {
                echo $tab.$tab.'<input type="hidden" name="update" value="'.$_GET['gren'].'">'.$nl;
            }
            echo $tab.$tab.'<input type="hidden" name="site" value="'.$_GET['site'].'">'.$nl;
            echo $tab.$tab.'<button type="submit" onclick="uppdate()" name="Spara">Spara</button>'.$nl;
            echo $tab.'</div>'.$nl;
        echo '</form>'.$nl;
}
else {
    echo "<script type='text/javascript'>
            alert('Välj ett start nr från startsidan.');
                window.location='index.php';
        </script>";

}
require 'footer.php';
?>