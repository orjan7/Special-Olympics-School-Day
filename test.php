<?php
require 'header.php';

if ($_GET['editstudent']=1) {
    // $startnumber = $_GET['startNumber'];
    // $fromSite = $_GET['site'];
    // echo $fromSite;
    // WHERE athletes.startNumber=5
    // $sql1 = "SELECT * FROM athletes INNER JOIN school ON athletes.schoolNumber=school.id INNER JOIN branch ON athletes.startNumber=branch.startNumberA ";
    $sql1 = "SELECT * FROM school INNER JOIN athletes ON school.id=athletes.schoolNumber INNER JOIN branch ON athletes.startNumber=branch.startNumberA WHERE athletes.startNumber=2";
    $result1 = $mysqli -> query($sql1);
    $numcountfields1 = mysqli_num_fields($result1);
    $fieldConunt = $numcountfields1-1;
    
    $sql2 = "SELECT * FROM school";
    $result2 = $mysqli -> query($sql2);
    $roeCount2 = mysqli_num_rows($result2);

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
    
    // $city = array();
    while ($row1 = mysqli_fetch_array($result2)) {
        $id[] = $row1['id'];
        $school[] = $row1['school'];
    }
    // echo implode('', $city);
    while ($row2 = mysqli_fetch_array($result1)) {
        
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><select name="school">'.$nl;
        foreach ($school as $school) {
            $student[] = $tab.$tab.$tab.$tab.$tab.'<option>'.$school.'</option>'.$nl;
            // $option = '<option value="'.$city.'">'.$city.'</option>';
        }
        if ($school = $row2[2]) {
            $student[] = $tab.$tab.$tab.$tab.$tab.'<option selected="selected">'.$row2[2].'</option>'.$nl;
        }
        $student[] = $tab.$tab.$tab.$tab.$tab.'<select></td>'.$nl;
        // $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="text" name="place" value="'.$row2[1].'"></td>'.$nl;
        // $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="text" name="school" value="'.$row2[2].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="text" name="stage" value="'.$row2[5].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="text" name="firstName" value="'.$row2[6].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="text" name="lastName" value="'.$row2[7].'"></td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="hidden" name="startNumber" value="'.$row2[8].'">'.$row2[8].'</td>'.$nl;
        $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2" class="text-left"><input type="text" name="disabilities" value="'.$row2[9].'"></td>'.$nl;
        if ($row2[10] == " ") {
            $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="checkbox" name="photo"></td>'.$nl;
        }
        else {
            $student[] = $tab.$tab.$tab.$tab.$tab.'<td colspan="2"><input type="checkbox" name="photo" checked></td>'.$nl;
        }
        
        for ($y=13; $y <= $fieldConunt; $y++) { 
            
            if ($row2[$y] == 0) {
                $branch[] = $tab.$tab.$tab.$tab.$tab.'<td><input type="checkbox" name="checkbox[]" value="'.$branchCheck[$y].'">'.$branchCheck[$y].'</td>'.$nl;
            }
            else {
                $branch[] = $tab.$tab.$tab.$tab.$tab.'<td><input type="checkbox" name="checkbox[]" value="'.$branchCheck[$y].'" checked>'.$branchCheck[$y].'</td>'.$nl;
            }
        }
    }
    //-- Edit athletes --
        echo $nl.$tab.$tab.'<table class="table">'.$nl;
        echo $tab.$tab.$tab.'<thead class="report-header">'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
            // echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Ort</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Skola</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Nivå</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Förnamn</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Efternamn</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" nowrap scope="col">Start nr</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Skada</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th colspan="2" class="report-header-cell" scope="col">Foto</th>'.$nl;
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
        echo $tab.$tab.$tab.'</thead>'.$nl;
        echo $tab.$tab.$tab.'<tbody>'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
            echo implode("", $student);
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
        echo $tab.$tab.$tab.'</tbody>'.$nl;
        echo $tab.$tab.$tab.'<thead class="report-header">'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
            echo implode("", $branchTh);
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
    echo $tab.$tab.$tab.'<thead">'.$nl;
    echo $tab.$tab.$tab.'<tbody>'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
        echo implode("", $branch);
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
    echo $tab.$tab.$tab.'</tbody>'.$nl;
    echo $tab.$tab.'</table">'.$nl;
}
else {
    echo "<script type='text/javascript'>
            alert('Välj ett start nr från startsidan.');
                window.location='index.php';
        </script>";

}
require 'footer.php';
?>